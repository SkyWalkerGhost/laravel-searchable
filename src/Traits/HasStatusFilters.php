<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use BackedEnum;
use Shergela\Searchable\Enums\Status;

trait HasStatusFilters
{
    use HasStatusFilters2;

    public function hasStatus(string $field = 'status', BackedEnum|string|null $value = null): static
    {
        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        $value = $this->parseString(field: $field, value: $value);

        if ($value === null) {
            return $this;
        }

        return $this->search(field: $field, value: $value);
    }

    // -------------------------------------------------------------------------
    // General
    // -------------------------------------------------------------------------

    public function active(): static
    {
        return $this->hasStatus(value: Status::Active);
    }

    public function inactive(): static
    {
        return $this->hasStatus(value: Status::Inactive);
    }

    public function deleted(): static
    {
        return $this->hasStatus(value: Status::Deleted);
    }

    public function archived(): static
    {
        return $this->hasStatus(value: Status::Archived);
    }

    public function draft(): static
    {
        return $this->hasStatus(value: Status::Draft);
    }

    public function suspended(): static
    {
        return $this->hasStatus(value: Status::Suspended);
    }

    public function blocked(): static
    {
        return $this->hasStatus(value: Status::Blocked);
    }

    public function locked(): static
    {
        return $this->hasStatus(value: Status::Locked);
    }

    public function hidden(): static
    {
        return $this->hasStatus(value: Status::Hidden);
    }

    public function paused(): static
    {
        return $this->hasStatus(value: Status::Paused);
    }

    public function enabled(): static
    {
        return $this->hasStatus(value: Status::Enabled);
    }

    public function disabled(): static
    {
        return $this->hasStatus(value: Status::Disabled);
    }

    // -------------------------------------------------------------------------
    // Workflow / Lifecycle
    // -------------------------------------------------------------------------

    public function pending(): static
    {
        return $this->hasStatus(value: Status::Pending);
    }

    public function inProgress(): static
    {
        return $this->hasStatus(value: Status::InProgress);
    }

    public function onHold(): static
    {
        return $this->hasStatus(value: Status::OnHold);
    }

    public function scheduled(): static
    {
        return $this->hasStatus(value: Status::Scheduled);
    }

    public function processing(): static
    {
        return $this->hasStatus(value: Status::Processing);
    }

    public function completed(): static
    {
        return $this->hasStatus(value: Status::Completed);
    }

    public function cancelled(): static
    {
        return $this->hasStatus(value: Status::Cancelled);
    }

    public function failed(): static
    {
        return $this->hasStatus(value: Status::Failed);
    }

    public function expired(): static
    {
        return $this->hasStatus(value: Status::Expired);
    }

    public function skipped(): static
    {
        return $this->hasStatus(value: Status::Skipped);
    }

    public function retrying(): static
    {
        return $this->hasStatus(value: Status::Retrying);
    }

    public function timedOut(): static
    {
        return $this->hasStatus(value: Status::TimedOut);
    }

    // -------------------------------------------------------------------------
    // Review / Approval
    // -------------------------------------------------------------------------

    public function pendingReview(): static
    {
        return $this->hasStatus(value: Status::PendingReview);
    }

    public function underReview(): static
    {
        return $this->hasStatus(value: Status::UnderReview);
    }

    public function approved(): static
    {
        return $this->hasStatus(value: Status::Approved);
    }

    public function disapproved(): static
    {
        return $this->hasStatus(value: Status::Disapproved);
    }

    public function rejected(): static
    {
        return $this->hasStatus(value: Status::Rejected);
    }

    public function flagged(): static
    {
        return $this->hasStatus(value: Status::Flagged);
    }

    public function escalated(): static
    {
        return $this->hasStatus(value: Status::Escalated);
    }

    // -------------------------------------------------------------------------
    // Content Publishing
    // -------------------------------------------------------------------------

    public function published(): static
    {
        return $this->hasStatus(value: Status::Published);
    }

    public function unpublished(): static
    {
        return $this->hasStatus(value: Status::Unpublished);
    }

    public function featured(): static
    {
        return $this->hasStatus(value: Status::Featured);
    }

    // -------------------------------------------------------------------------
    // Order / E-commerce
    // -------------------------------------------------------------------------

    public function pendingPayment(): static
    {
        return $this->hasStatus(value: Status::PendingPayment);
    }

    public function paid(): static
    {
        return $this->hasStatus(value: Status::Paid);
    }

    public function shipped(): static
    {
        return $this->hasStatus(value: Status::Shipped);
    }

    public function delivered(): static
    {
        return $this->hasStatus(value: Status::Delivered);
    }

    public function received(): static
    {
        return $this->hasStatus(value: Status::Received);
    }

    public function returned(): static
    {
        return $this->hasStatus(value: Status::Returned);
    }

    public function open(): static
    {
        return $this->hasStatus(value: Status::Open);
    }

    public function closed(): static
    {
        return $this->hasStatus(value: Status::Closed);
    }
}
