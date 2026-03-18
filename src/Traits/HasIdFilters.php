<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasIdFilters
{
    use HasIdFilters2;
    use HasIdFilters3;

    public function id(
        string $field = 'id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        $value = $this->parseInt(
            field: $field,
            value: $value,
        );

        if ($value === null) {
            return $this;
        }

        $this->search(field: $field, operator: $operator, value: $value);

        return $this;
    }

    public function userId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'user_id', value: $value, operator: $operator);
    }

    public function walletId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'wallet_id', value: $value, operator: $operator);
    }

    public function paymentId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'payment_id', value: $value, operator: $operator);
    }

    public function transactionId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'transaction_id', value: $value, operator: $operator);
    }

    public function productId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'product_id', value: $value, operator: $operator);
    }

    public function orderId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'order_id', value: $value, operator: $operator);
    }

    public function invoiceId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'invoice_id', value: $value, operator: $operator);
    }

    public function couponId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'coupon_id', value: $value, operator: $operator);
    }

    public function orderItemId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'order_item_id', value: $value, operator: $operator);
    }

    public function postId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'post_id', value: $value, operator: $operator);
    }

    public function commentId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'comment_id', value: $value, operator: $operator);
    }

    public function tagId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'tag_id', value: $value, operator: $operator);
    }

    public function categoryId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'category_id', value: $value, operator: $operator);
    }

    public function roleId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'role_id', value: $value, operator: $operator);
    }

    public function permissionId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'permission_id', value: $value, operator: $operator);
    }

    public function marketId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'market_id', value: $value, operator: $operator);
    }

    public function brandId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'brand_id', value: $value, operator: $operator);
    }

    public function betId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'bet_id', value: $value, operator: $operator);
    }

    public function cartId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'cart_id', value: $value, operator: $operator);
    }

    public function addressId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'address_id', value: $value, operator: $operator);
    }

    public function attributeId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'attribute_id', value: $value, operator: $operator);
    }

    public function attributeValueId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'attribute_value_id', value: $value, operator: $operator);
    }

    public function visitorId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'visitor_id', value: $value, operator: $operator);
    }

    public function blogId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'blog_id', value: $value, operator: $operator);
    }
}
