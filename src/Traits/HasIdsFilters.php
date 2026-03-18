<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Support\Collection;

trait HasIdsFilters
{
    use HasIdsFilters2;

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

    // ==================== Users ====================

    public function userIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'user_id', values: $values);
    }

    public function adminIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'admin_id', values: $values);
    }

    public function moderatorIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'moderator_id', values: $values);
    }

    public function managerIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'manager_id', values: $values);
    }

    public function customerIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'customer_id', values: $values);
    }

    public function subscriberIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'subscriber_id', values: $values);
    }

    public function visitorIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'visitor_id', values: $values);
    }

    public function ownerIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'owner_id', values: $values);
    }

    // ==================== Commerce ====================

    public function walletIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'wallet_id', values: $values);
    }

    public function paymentIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'payment_id', values: $values);
    }

    public function transactionIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'transaction_id', values: $values);
    }

    public function orderIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'order_id', values: $values);
    }

    public function orderItemIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'order_item_id', values: $values);
    }

    public function invoiceIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'invoice_id', values: $values);
    }

    public function couponIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'coupon_id', values: $values);
    }

    public function cartIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'cart_id', values: $values);
    }

    public function shopIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'shop_id', values: $values);
    }

    public function marketIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'market_id', values: $values);
    }

    public function betIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'bet_id', values: $values);
    }

    // ==================== Products ====================

    public function productIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'product_id', values: $values);
    }

    public function brandIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'brand_id', values: $values);
    }

    public function attributeIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'attribute_id', values: $values);
    }

    public function attributeValueIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'attribute_value_id', values: $values);
    }

    public function addressIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'address_id', values: $values);
    }

    // ==================== Content ====================

    public function postIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'post_id', values: $values);
    }

    public function commentIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'comment_id', values: $values);
    }

    public function tagIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'tag_id', values: $values);
    }

    public function categoryIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'category_id', values: $values);
    }

    public function blogIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'blog_id', values: $values);
    }

    public function pageIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'page_id', values: $values);
    }

    public function menuIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'menu_id', values: $values);
    }

    public function subjectIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'subject_id', values: $values);
    }
}
