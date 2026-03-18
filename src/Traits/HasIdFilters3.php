<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasIdFilters3
{
    public function statisticId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'statistic_id', value: $id, operator: $operator);
    }

    public function activityId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'activity_id', value: $id, operator: $operator);
    }

    public function logId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'log_id', value: $id, operator: $operator);
    }

    public function jobId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'job_id', value: $id, operator: $operator);
    }

    public function statusId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'status_id', value: $id, operator: $operator);
    }

    public function categoryGroupId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'category_group_id', value: $id, operator: $operator);
    }
}
