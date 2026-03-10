<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Support\Collection;

trait HasIdsFilters
{
    public function ids(string $field = 'id', Collection|array|null $values = null): static
    {
        if ($values === null
            || (is_array($values) && empty($values))
            || ($values instanceof Collection && $values->isEmpty())
        ) {
            return $this;
        }

        if ($values instanceof Collection) {
            $values = $values->toArray();
        }

        $this->whereIn(field: $field, values: $values);

        return $this;
    }

    public function userIds(Collection|array|null $values = null, string $field = 'user_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function walletIds(Collection|array|null $values = null, string $field = 'wallet_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function paymentIds(Collection|array|null $values = null, string $field = 'payment_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function transactionIds(Collection|array|null $values = null, string $field = 'transaction_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function productIds(Collection|array|null $values = null, string $field = 'product_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function orderIds(Collection|array|null $values = null, string $field = 'order_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function invoiceIds(Collection|array|null $values = null, string $field = 'invoice_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function couponIds(Collection|array|null $values = null, string $field = 'coupon_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function orderItemIds(Collection|array|null $values = null, string $field = 'order_item_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function postIds(Collection|array|null $values = null, string $field = 'post_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function commentIds(Collection|array|null $values = null, string $field = 'comment_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function tagIds(Collection|array|null $values = null, string $field = 'tag_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function categoryIds(Collection|array|null $values = null, string $field = 'category_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function roleIds(Collection|array|null $values = null, string $field = 'role_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function permissionIds(Collection|array|null $values = null, string $field = 'permission_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function marketIds(Collection|array|null $values = null, string $field = 'market_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function brandIds(Collection|array|null $values = null, string $field = 'brand_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function betIds(Collection|array|null $values = null, string $field = 'bet_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function cartIds(Collection|array|null $values = null, string $field = 'cart_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function addressIds(Collection|array|null $values = null, string $field = 'address_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function attributeIds(Collection|array|null $values = null, string $field = 'attribute_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function attributeValueIds(
        string $field = 'attribute_value_id',
        Collection|array|null $values = null
    ): static {
        return $this->ids(field: $field, values: $values);
    }

    public function visitorIds(Collection|array|null $values = null, string $field = 'visitor_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function customerIds(Collection|array|null $values = null, string $field = 'customer_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function blogIds(Collection|array|null $values = null, string $field = 'blog_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }
}
