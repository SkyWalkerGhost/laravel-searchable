<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasBooleanFilters
{
    // -------------------------------------------------------------------------
    // Base boolean filter
    // -------------------------------------------------------------------------

    public function boolean(string $field, ?bool $value = null): static
    {
        $value = $this->parseBool(field: $field, value: $value);

        if ($value === null) {
            return $this;
        }

        $this->builder->where(column: $field, operator: '=', value: $value);

        return $this;
    }

    // -------------------------------------------------------------------------
    // Predefined boolean field filters
    // -------------------------------------------------------------------------

    public function isActive(?bool $value = true): static
    {
        return $this->boolean(field: 'is_active', value: $value);
    }

    public function isVerified(?bool $value = true): static
    {
        return $this->boolean(field: 'is_verified', value: $value);
    }

    public function isBlocked(?bool $value = true): static
    {
        return $this->boolean(field: 'is_blocked', value: $value);
    }

    public function isDeleted(?bool $value = true): static
    {
        return $this->boolean(field: 'is_deleted', value: $value);
    }

    public function isPublished(?bool $value = true): static
    {
        return $this->boolean(field: 'is_published', value: $value);
    }

    public function isFeatured(?bool $value = true): static
    {
        return $this->boolean(field: 'is_featured', value: $value);
    }

    public function isDefault(?bool $value = true): static
    {
        return $this->boolean(field: 'is_default', value: $value);
    }

    public function isPrimary(?bool $value = true): static
    {
        return $this->boolean(field: 'is_primary', value: $value);
    }

    public function isRead(?bool $value = true): static
    {
        return $this->boolean(field: 'is_read', value: $value);
    }

    public function isPinned(?bool $value = true): static
    {
        return $this->boolean(field: 'is_pinned', value: $value);
    }

    public function isOnline(): static
    {
        return $this->boolean(field: 'is_online', value: true);
    }

    public function isOffline(): static
    {
        return $this->boolean(field: 'is_online', value: false);
    }

    // -------------------------------------------------------------------------
    // Helpers: where true / false
    // -------------------------------------------------------------------------

    public function whereTrue(string $field): static
    {
        $this->builder->where(column: $field, operator: '=', value: true);

        return $this;
    }

    public function whereFalse(string $field): static
    {
        $this->builder->where(column: $field, operator: '=', value: false);

        return $this;
    }
}
