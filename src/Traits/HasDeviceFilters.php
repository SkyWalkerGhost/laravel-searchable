<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasDeviceFilters
{
    public function device(string $field = 'device', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function platform(?string $value = null, string $operator = '='): static
    {
        return $this->text(field: 'platform', value: $value, operator: $operator);
    }

    public function browser(?string $value = null, string $operator = '='): static
    {
        return $this->text(field: 'browser', value: $value, operator: $operator);
    }

    public function deviceType(?string $value = null, string $operator = '='): static
    {
        return $this->text(field: 'device_type', value: $value, operator: $operator);
    }

    public function userAgent(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'user_agent', value: $value, operator: $operator);
    }

    public function isDesktop(?bool $value = null): static
    {
        return $this->boolean(field: 'is_desktop', value: $value);
    }

    public function isMobile(?bool $value = null): static
    {
        return $this->boolean(field: 'is_mobile', value: $value);
    }

    public function isTablet(?bool $value = null): static
    {
        return $this->boolean(field: 'is_tablet', value: $value);
    }
}
