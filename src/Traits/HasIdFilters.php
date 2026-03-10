<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasIdFilters
{
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

    public function userId(
        string $field = 'user_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function walletId(
        string $field = 'wallet_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function paymentId(
        string $field = 'payment_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function transactionId(
        string $field = 'transaction_id',
        ?int $value = null,
        string $operator = '=',

    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function productId(
        string $field = 'product_id',
        ?int $value = null,
        string $operator = '=',

    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function orderId(
        string $field = 'order_id',
        ?int $value = null,
        string $operator = '=',

    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function invoiceId(
        string $field = 'invoice_id',
        ?int $value = null,
        string $operator = '=',

    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function couponId(
        string $field = 'coupon_id',
        ?int $value = null,
        string $operator = '=',

    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function orderItemId(
        string $field = 'order_item_id',
        ?int $value = null,
        string $operator = '=',

    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function postId(
        string $field = 'post_id',
        ?int $value = null,
        string $operator = '=',

    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function commentId(
        string $field = 'comment_id',
        ?int $value = null,
        string $operator = '=',

    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function tagId(
        string $field = 'tag_id',
        ?int $value = null,
        string $operator = '=',

    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function categoryId(
        string $field = 'category_id',
        ?int $value = null,
        string $operator = '=',

    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function roleId(
        string $field = 'role_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function permissionId(
        string $field = 'permission_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function marketId(
        string $field = 'market_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function brandId(
        string $field = 'brand_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function betId(
        string $field = 'bet_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function cartId(
        string $field = 'cart_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function addressId(
        string $field = 'address_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function attributeId(
        string $field = 'attribute_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function attributeValueId(
        string $field = 'attribute_value_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function visitorId(
        string $field = 'visitor_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function blogId(
        string $field = 'blog_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }

    public function customerId(
        string $field = 'customer_id',
        ?int $value = null,
        string $operator = '=',
    ): static {
        return $this->id(field: $field, value: $value, operator: $operator);
    }
}
