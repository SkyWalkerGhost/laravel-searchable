<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

trait HasIdFilters
{
    public function id(
        string $field = 'id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        $value = $this->parseInt(
            field: $field,
            value: $value,
            request: $request
        );

        if ($value === null) {
            return $this;
        }

        $this->search(field: $field, operator: $operator, value: $value);

        return $this;
    }

    public function ids(string $field = 'id', Collection|array|null $values = null): static
    {
        if ($values === null) {
            return $this;
        }

        if ($values instanceof Collection) {
            $values = $values->toArray();
        }

        $this->whereIn(field: $field, values: $values);

        return $this;
    }

    public function userId(
        string $field = 'user_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function userIds(Collection|array|null $values = null, string $field = 'user_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function walletId(
        string $field = 'wallet_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function walletIds(Collection|array|null $values = null, string $field = 'wallet_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function paymentId(
        string $field = 'payment_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function paymentIds(Collection|array|null $values = null, string $field = 'payment_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function transactionId(
        string $field = 'transaction_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function transactionIds(Collection|array|null $values = null, string $field = 'transaction_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function productId(
        string $field = 'product_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function productIds(Collection|array|null $values = null, string $field = 'product_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function orderId(
        string $field = 'order_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function orderIds(Collection|array|null $values = null, string $field = 'order_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function invoiceId(
        string $field = 'invoice_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function invoiceIds(Collection|array|null $values = null, string $field = 'invoice_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function couponId(
        string $field = 'coupon_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function couponIds(Collection|array|null $values = null, string $field = 'coupon_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function orderItemId(
        string $field = 'order_item_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function orderItemIds(Collection|array|null $values = null, string $field = 'order_item_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function postId(
        string $field = 'post_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function postIds(Collection|array|null $values = null, string $field = 'post_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function commentId(
        string $field = 'comment_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function commentIds(Collection|array|null $values = null, string $field = 'comment_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function tagId(
        string $field = 'tag_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function tagIds(Collection|array|null $values = null, string $field = 'tag_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function categoryId(
        string $field = 'category_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function categoryIds(Collection|array|null $values = null, string $field = 'category_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function roleId(
        string $field = 'role_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function roleIds(Collection|array|null $values = null, string $field = 'role_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function permissionId(
        string $field = 'permission_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function permissionIds(Collection|array|null $values = null, string $field = 'permission_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function marketId(
        string $field = 'market_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function marketIds(Collection|array|null $values = null, string $field = 'market_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function brandId(
        string $field = 'brand_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function brandIds(Collection|array|null $values = null, string $field = 'brand_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function betId(
        string $field = 'bet_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function betIds(Collection|array|null $values = null, string $field = 'bet_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function cartId(
        string $field = 'cart_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function cartIds(Collection|array|null $values = null, string $field = 'cart_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function addressId(
        string $field = 'address_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function addressIds(Collection|array|null $values = null, string $field = 'address_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function attributeId(
        string $field = 'attribute_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function attributeIds(Collection|array|null $values = null, string $field = 'attribute_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }

    public function attributeValueId(
        string $field = 'attribute_value_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function attributeValueIds(
        string $field = 'attribute_value_id',
        Collection|array|null $values = null
    ): static {
        return $this->ids(field: $field, values: $values);
    }

    public function visitorId(
        string $field = 'visitor_id',
        ?int $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function visitorIds(Collection|array|null $values = null, string $field = 'visitor_id'): static
    {
        return $this->ids(field: $field, values: $values);
    }
}
