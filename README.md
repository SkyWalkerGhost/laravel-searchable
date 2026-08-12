# Laravel Searchable

`laravel-searchable` is a Laravel package that provides a simple and reusable way to apply **dynamic filtering and searching** to Eloquent queries.

The package includes multiple filter types such as:

* Numeric filters (amount, balance, price)
* Date filters
* Time filters
* Boolean filters
* Ordering helpers
* Full-text search
* Eager loading
* Validation
* Custom methods

Filtering is applied through a **static `Search` builder** that wraps an Eloquent query.

---

## Why Use This Package

This package is useful when your application has:

* many filtering conditions
* large search APIs
* reusable filtering logic
* request-based query filtering

It keeps your controllers and services **clean and readable** while keeping filtering logic centralized.

---

## Installation

```bash
composer require shergela/laravel-searchable
```

---

## Basic Usage

The package is used through the `Search` class.

```php
use Shergela\Searchable\Search;

$payments = Search::query(Payment::query())
    ->ignoreMissingFields()
    ->with(['payable', 'user'])
    ->id(value: $request->integer('payment_id', null))
    ->userId()
    ->status()
    ->validate()
    ->amount()
    ->orderByDesc();
```

The `Search` builder wraps your Eloquent query and applies filters dynamically.

---

## Validation

Filtering often uses request values, therefore validation is supported.

Validation can be defined in **two ways**:

1. Using the `Validatable` interface on the model
2. Passing rules manually to the `validate()` method

### Using the `Validatable` Interface

Your model may implement the `Validatable` interface.

```php
use Illuminate\Database\Eloquent\Model;
use Shergela\Searchable\Contracts\Validatable;

class Payment extends Model implements Validatable
{
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'status' => ['nullable', 'string'],
            'amount' => ['nullable', 'numeric'],
        ];
    }
}
```

When the `validate()` method is called, the package will automatically read these rules.

### Passing Rules Manually

If you prefer not to use the interface, you may pass validation rules directly.

```php
use Shergela\Searchable\Search;

$payments = Search::query(Payment::query())
    ->validate([
        'amount' => ['nullable', 'numeric'],
        'status' => ['nullable', 'string'],
    ])
    ->amount();
```

### Redirect After Validation Failure

By default, when validation fails, Laravel redirects back to the previous page. If you need to redirect to a **specific URL** after a failed validation, use the `redirectTo()` method.

```php
Search::query(Payment::query())
    ->redirectTo(url: '/payments') // or route('payments.index')
    ->validate([
        'amount' => ['nullable', 'numeric'],
        'status' => ['nullable', 'string'],
    ])
    ->amount()
    ->status()
    ->orderByDesc();
```

> **Recommendation:** Call `redirectTo()` before `validate()` so the redirect destination is defined prior to validation being executed.

### Important Rule for GET Requests

When filtering using **GET requests**, all filter fields **must include the `nullable` rule**.

```php
[
    'amount' => ['nullable', 'numeric'],
]
```

This is important because when the field is not present in the request, Laravel validation would otherwise fail.

---

## Filtering Methods

Every filter method supports **three ways of receiving its value**. This allows the filter to work with requests, manual values, or custom input names.

### 1. Automatic Value Detection from Field

Filters automatically retrieve the value based on the field name. You do not need to pass the request manually.

```php
Search::query(Payment::query())
    ->amount(); // the field name is 'amount'
```

Example request:

```
GET /payments?amount=100
```

SQL equivalent:

```sql
WHERE amount = 100
```

### 2. Passing a Custom Field Name

Each filter method has a default field name it uses to read the value from the request and the corresponding database column. If your request input name or database column differs from the default, you can pass a custom field.

> **Important:** The `field` value must match **both** the request input name and the database column name — they must be identical.

```php
Search::query(Payment::query())
    ->amount(field: 'total_amount');
```

Example request:

```
GET /payments?total_amount=100
```

SQL equivalent:

```sql
WHERE total_amount = 100
```

### 3. Passing Field + Value

You may bypass the request completely.

```php
Search::query(Payment::query())
    ->amount(field: 'amount', value: 100);
```

This is useful when filtering from:

* DTOs
* services
* computed values
* CLI inputs

---

## Ignoring Missing Fields

When a form has **disabled input fields**, the browser does not include them in the request payload. This means the corresponding key will be entirely absent from the request, which can cause the filter to behave unexpectedly — for example, applying an empty condition to the query.

Calling `ignoreMissingFields()` instructs the package to **skip any filter whose field is not present in the request**, preventing empty or unnecessary query conditions from being applied.

> **Recommendation:** Always call `ignoreMissingFields()` at the **beginning of the chain**, before any filter methods, to ensure consistent behavior across all filters.

```php
Search::query(Payment::query())
    ->ignoreMissingFields()  // <-- call this first
    ->status()
    ->amount()
    ->orderByDesc();
```

Without `ignoreMissingFields()`, a disabled or absent field could still be evaluated and result in an unintended `WHERE` clause.

---

## Full Text Search

The `fullTextSearch()` method performs an optimized text search across one or more columns. It automatically detects the database driver and applies the most appropriate search strategy.

### Supported Drivers

| Driver | Strategy |
|---|---|
| `pgsql` | `tsvector` + `plainto_tsquery` |
| `mysql` | `MATCH ... AGAINST` (Natural Language Mode) |
| Other (SQLite, etc.) | `LIKE` fallback with `LOWER()` |

### Parameters

| Parameter | Type | Default | Description |
|---|---|---|---|
| `$columns` | `array` | `['full_name']` | Columns to search in (max 5) |
| `$relation` | `string\|null` | `null` | Relation name if searching in a related model |
| `$value` | `string\|null` | `null` | Search value. If `null`, filter is skipped |

### Basic Usage

Search within the model's own columns:

```php
Search::query(Payment::query())
    ->fullTextSearch(
        columns: ['first_name', 'last_name'],
        value: $request->string('name')->value()
    );
```

### Searching Within a Relation

If the searchable columns belong to a related model, pass the relation name:

```php
Search::query(Payment::query())
    ->fullTextSearch(
        columns: ['first_name', 'last_name'],
        relation: 'user',
        value: $request->string('user_name')->value()
    );
```

This translates to:

```sql
WHERE EXISTS (
    SELECT * FROM users
    WHERE payments.user_id = users.id
    AND MATCH(first_name, last_name) AGAINST(? IN NATURAL LANGUAGE MODE)
)
```

### Driver Behavior

**PostgreSQL:**

```sql
WHERE (to_tsvector('simple', coalesce("first_name", '')) || to_tsvector('simple', coalesce("last_name", '')))
    @@ plainto_tsquery('simple', ?)
```

**MySQL:**

```sql
WHERE MATCH(`first_name`, `last_name`) AGAINST(? IN NATURAL LANGUAGE MODE)
```

**SQLite / Other (LIKE fallback):**

```sql
WHERE LOWER("first_name") LIKE '%john%'
   OR LOWER("last_name") LIKE '%john%'
```

### Validation Rules

The method enforces two rules on the `columns` array:

- Maximum **5 columns** allowed
- Column names must be **valid identifiers** — only letters, numbers, underscores, and dots are permitted (e.g. `first_name`, `address.city`). SQL injection attempts are rejected.

```php
// ✅ Valid
->fullTextSearch(columns: ['first_name', 'last_name', 'email'], value: 'john')

// ❌ Throws InvalidArgumentException — too many columns
->fullTextSearch(columns: ['a', 'b', 'c', 'd', 'e', 'f'], value: 'john')

// ❌ Throws InvalidArgumentException — invalid column name
->fullTextSearch(columns: ['first_name; DROP TABLE users'], value: 'john')
```

### Notes

- If `$value` is `null`, the filter is **silently skipped** — no query condition is added.
- The `LIKE` fallback is **case-insensitive** via `LOWER()`.
- For **MySQL**, ensure the columns have a `FULLTEXT` index for optimal performance.
- For **PostgreSQL**, the `'simple'` dictionary is used, meaning no language-specific stemming is applied.

---

## Eager Loading

Since the package wraps an Eloquent builder, you may also use `with()`.

```php
Search::query(Payment::query())
    ->with(['user', 'payable']);
```

---

## Available Ordering/Helper Methods

* `get`
* `first`
* `pluck`
* `orderBy`
* `orderByDesc`
* `latest`
* `paginate`
* `cursorPaginate`

```php
Search::query(Payment::query())
    ->orderByDesc()
    ->get();
```

Example SQL:

```sql
ORDER BY id DESC
```

---

## Custom Search Methods

If the built-in filter methods are not enough, you can extend the `Searchable` class and define your own custom methods. The class name and its purpose are entirely up to you — the examples below use `UserService` purely to demonstrate how `Searchable` can be extended and used with the `User` model.

### 1. Creating a Searchable Class

Extend `Shergela\Searchable\Searchable` and implement the `model()` method, which determines which Eloquent model the search will run against:

```php
<?php

declare(strict_types=1);

namespace App\Services\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Shergela\Searchable\Searchable;

class UserService extends Searchable
{
    protected function model(): Builder
    {
        return User::query();
    }

    public function customMethod(string $field = 'id', ?string $value = null, string $operator = '='): static
    {
        $this->search(field: $field, operator: $operator, value: $value);

        return $this;
    }

    public function customMethod2(string $field = 'id', ?string $value = null, string $operator = '='): static
    {
        $this->search(field: $field, operator: $operator, value: $value);

        return $this;
    }
}
```

Custom methods can contain any logic your application needs. They simply need to return the `Searchable` instance so they can be chained, and they internally call the `search()` helper to add a condition to the query.

### 2. Calling Custom Methods

Use the static `query()` entry point, just like with the `Search` class. Custom methods can be freely combined and chained:

```php
use App\Services\Users\UserService;

$query = UserService::query()
    ->customMethod(field: 'id', value: '1')
    ->customMethod2(field: 'email', value: 'john@gmail.com')
    ->firstName(value: 'John')
    ->lastName(value: 'Doe');
```

In this example, the query contains conditions for `id = 1`, `email = 'john@gmail.com'`, `first_name = 'John'`, and `last_name = 'Doe'`.

All conditions are combined into the same query.

> **Note:** This approach keeps filtering logic **encapsulated in a dedicated service class**, making it easy to reuse and test.

### 3. Executing the Query

Calling `query()` and chaining search methods builds the query but does not execute it immediately. You execute it using standard Eloquent methods such as `first()` or `get()`.

**Get a single result:**

```php
$user = UserService::query()
    ->customMethod(field: 'id', value: '1')
    ->first();
```

**Get all results:**

```php
$users = UserService::query()
    ->customMethod2(field: 'email', value: 'john@gmail.com')
    ->get();
```

**Complete example:**

```php
$query = UserService::query()
    ->customMethod(field: 'id', value: '1')
    ->customMethod2(field: 'email', value: 'john@gmail.com')
    ->firstName(value: 'John')
    ->lastName(value: 'Doe');

$user = $query->first();
```

### 4. Using Laravel's Eloquent Methods Directly

If you need native Laravel Eloquent methods (such as `where`, `select`, `join`, `paginate`, etc.), access the underlying Eloquent builder via the `builder()` method.

```php
UserService::query()
    ->customMethod(field: 'status', value: $request->string('status')->value())
    ->builder()
    ->where('verified', true)
    ->paginate(15);
```

> **Recommendation:** Call `builder()` at the **end of the chain**, after all package methods have been applied. Calling it earlier returns a plain Eloquent builder, meaning you lose access to the package's custom methods for any subsequent calls.

---

## Full Example

```php
use Shergela\Searchable\Search;

$payments = Search::query(Payment::query())
    ->ignoreMissingFields()
    ->with(['payable', 'user'])
    ->id(value: $request->integer('payment_id', null))
    ->userId()
    ->status()
    ->validate()
    ->amount()
    ->orderByDesc();
```

---

## License

MIT
