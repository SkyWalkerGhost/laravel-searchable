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

    public function clientId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'client_id', value: $id, operator: $operator);
    }

    public function projectId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'project_id', value: $id, operator: $operator);
    }

    public function countryId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'country_id', value: $id, operator: $operator);
    }

    public function cityId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'city_id', value: $id, operator: $operator);
    }

    public function propertyId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'property_id', value: $id, operator: $operator);
    }

    public function propertyTypeId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'property_type_id', value: $id, operator: $operator);
    }

    public function renovationId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'renovation_id', value: $id, operator: $operator);
    }

    public function renovationConditionId(?int $id = null, string $operator = '='): static
    {
        return $this->id(field: 'renovation_condition_id', value: $id, operator: $operator);
    }
}
