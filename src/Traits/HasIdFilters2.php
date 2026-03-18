<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasIdFilters2
{
    public function customerId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'customer_id', value: $value, operator: $operator);
    }

    public function subjectId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'subject_id', value: $value, operator: $operator);
    }

    public function sizeId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'size_id', value: $value, operator: $operator);
    }

    public function colorId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'color_id', value: $value, operator: $operator);
    }

    public function menuId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'menu_id', value: $value, operator: $operator);
    }

    public function pageId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'page_id', value: $value, operator: $operator);
    }

    public function shopId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'shop_id', value: $value, operator: $operator);
    }

    public function ownerId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'owner_id', value: $value, operator: $operator);
    }

    public function parentId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'parent_id', value: $value, operator: $operator);
    }

    public function childId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'child_id', value: $value, operator: $operator);
    }

    public function adminId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'admin_id', value: $value, operator: $operator);
    }

    public function moderatorId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'moderator_id', value: $value, operator: $operator);
    }

    public function subscriberId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'subscriber_id', value: $value, operator: $operator);
    }

    public function managerId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'manager_id', value: $value, operator: $operator);
    }

    public function withdrawalId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'withdrawal_id', value: $value, operator: $operator);
    }

    public function taskId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'task_id', value: $value, operator: $operator);
    }

    public function groupId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'group_id', value: $value, operator: $operator);
    }

    public function companyId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'company_id', value: $value, operator: $operator);
    }

    public function fileId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'file_id', value: $value, operator: $operator);
    }

    public function followerId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'follower_id', value: $value, operator: $operator);
    }

    public function followeeId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'followee_id', value: $value, operator: $operator);
    }

    public function followId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'follow_id', value: $value, operator: $operator);
    }

    public function subscriptionId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'subscription_id', value: $value, operator: $operator);
    }

    public function familyId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'family_id', value: $value, operator: $operator);
    }

    public function familyMemberId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'family_member_id', value: $value, operator: $operator);
    }

    public function memberId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'member_id', value: $value, operator: $operator);
    }

    public function familyRoleId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'family_role_id', value: $value, operator: $operator);
    }

    public function reviewId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'review_id', value: $value, operator: $operator);
    }

    public function reviewerId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'reviewer_id', value: $value, operator: $operator);
    }

    public function ratingId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'rating_id', value: $value, operator: $operator);
    }

    public function channelId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'channel_id', value: $value, operator: $operator);
    }

    public function channelGroupId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'channel_group_id', value: $value, operator: $operator);
    }

    public function auditId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'audit_id', value: $value, operator: $operator);
    }

    public function ticketId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'ticket_id', value: $value, operator: $operator);
    }

    public function typeId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'type_id', value: $value, operator: $operator);
    }

    public function calendarId(?int $value = null, string $operator = '='): static
    {
        return $this->id(field: 'calendar_id', value: $value, operator: $operator);
    }
}
