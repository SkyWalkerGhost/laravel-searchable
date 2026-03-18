<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Support\Collection;

trait HasIdsFilters2
{
    // ==================== Social ====================

    public function followerIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'follower_id', values: $values);
    }

    public function followeeIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'followee_id', values: $values);
    }

    public function followIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'follow_id', values: $values);
    }

    public function subscriptionIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'subscription_id', values: $values);
    }

    public function reviewIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'review_id', values: $values);
    }

    public function reviewersIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'reviewer_id', values: $values);
    }

    public function ratingIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'rating_id', values: $values);
    }

    public function channelIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'channel_id', values: $values);
    }

    public function channelGroupIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'channel_group_id', values: $values);
    }

    public function eventIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'event_id', values: $values);
    }

    // ==================== Organization ====================

    public function companyIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'company_id', values: $values);
    }

    public function groupIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'group_id', values: $values);
    }

    public function memberIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'member_id', values: $values);
    }

    public function familyIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'family_id', values: $values);
    }

    public function familyMemberIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'family_member_id', values: $values);
    }

    public function familyRoleIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'family_role_id', values: $values);
    }

    public function parentIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'parent_id', values: $values);
    }

    public function childIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'child_id', values: $values);
    }

    // ==================== System ====================

    public function roleIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'role_id', values: $values);
    }

    public function permissionIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'permission_id', values: $values);
    }

    public function taskIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'task_id', values: $values);
    }

    public function fileIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'file_id', values: $values);
    }

    public function auditIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'audit_id', values: $values);
    }

    public function ticketIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'ticket_id', values: $values);
    }

    public function typeIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'type_id', values: $values);
    }

    public function statusIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'status_id', values: $values);
    }

    public function calendarIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'calendar_id', values: $values);
    }

    public function statisticIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'statistic_id', values: $values);
    }

    public function logIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'log_id', values: $values);
    }

    public function categoryGroupIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'category_group_id', values: $values);
    }

    public function activityIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'activity_id', values: $values);
    }

    public function jobIds(Collection|array|null $values = null): static
    {
        return $this->ids(field: 'job_id', values: $values);
    }
}
