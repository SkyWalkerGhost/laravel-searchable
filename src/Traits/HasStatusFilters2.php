<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Shergela\Searchable\Enums\Status;

trait HasStatusFilters2
{
    // -------------------------------------------------------------------------
    // Payment / Refund
    // -------------------------------------------------------------------------

    public function refunded(): static
    {
        return $this->hasStatus(value: Status::Refunded);
    }

    public function partiallyRefunded(): static
    {
        return $this->hasStatus(value: Status::PartiallyRefunded);
    }

    public function refundedPartially(): static
    {
        return $this->hasStatus(value: Status::RefundedPartially);
    }

    public function refundedFully(): static
    {
        return $this->hasStatus(value: Status::RefundedFully);
    }

    public function partiallyPaid(): static
    {
        return $this->hasStatus(value: Status::PartiallyPaid);
    }

    public function chargeback(): static
    {
        return $this->hasStatus(value: Status::Chargeback);
    }

    public function disputed(): static
    {
        return $this->hasStatus(value: Status::Disputed);
    }

    public function overdue(): static
    {
        return $this->hasStatus(value: Status::Overdue);
    }

    // -------------------------------------------------------------------------
    // Record Change / Audit
    // -------------------------------------------------------------------------

    public function created(): static
    {
        return $this->hasStatus(value: Status::Created);
    }

    public function updated(): static
    {
        return $this->hasStatus(value: Status::Updated);
    }

    public function changed(): static
    {
        return $this->hasStatus(value: Status::Changed);
    }

    public function corrected(): static
    {
        return $this->hasStatus(value: Status::Corrected);
    }

    public function restored(): static
    {
        return $this->hasStatus(value: Status::Restored);
    }

    public function replaced(): static
    {
        return $this->hasStatus(value: Status::Replaced);
    }

    public function merged(): static
    {
        return $this->hasStatus(value: Status::Merged);
    }

    public function synced(): static
    {
        return $this->hasStatus(value: Status::Synced);
    }

    public function imported(): static
    {
        return $this->hasStatus(value: Status::Imported);
    }

    public function exported(): static
    {
        return $this->hasStatus(value: Status::Exported);
    }

    public function migrated(): static
    {
        return $this->hasStatus(value: Status::Migrated);
    }

    // -------------------------------------------------------------------------
    // Print / Document
    // -------------------------------------------------------------------------

    public function printed(): static
    {
        return $this->hasStatus(value: Status::Printed);
    }

    public function reprinted(): static
    {
        return $this->hasStatus(value: Status::Reprinted);
    }

    public function signed(): static
    {
        return $this->hasStatus(value: Status::Signed);
    }

    public function stamped(): static
    {
        return $this->hasStatus(value: Status::Stamped);
    }

    // -------------------------------------------------------------------------
    // User / Account
    // -------------------------------------------------------------------------

    public function verified(): static
    {
        return $this->hasStatus(value: Status::Verified);
    }

    public function unverified(): static
    {
        return $this->hasStatus(value: Status::Unverified);
    }

    public function banned(): static
    {
        return $this->hasStatus(value: Status::Banned);
    }

    public function deactivated(): static
    {
        return $this->hasStatus(value: Status::Deactivated);
    }

    public function pendingDelete(): static
    {
        return $this->hasStatus(value: Status::PendingDelete);
    }

    public function invited(): static
    {
        return $this->hasStatus(value: Status::Invited);
    }

    public function registered(): static
    {
        return $this->hasStatus(value: Status::Registered);
    }

    // -------------------------------------------------------------------------
    // System / Infrastructure
    // -------------------------------------------------------------------------

    public function running(): static
    {
        return $this->hasStatus(value: Status::Running);
    }

    public function stopped(): static
    {
        return $this->hasStatus(value: Status::Stopped);
    }

    public function queued(): static
    {
        return $this->hasStatus(value: Status::Queued);
    }

    public function idle(): static
    {
        return $this->hasStatus(value: Status::Idle);
    }

    public function healthy(): static
    {
        return $this->hasStatus(value: Status::Healthy);
    }

    public function degraded(): static
    {
        return $this->hasStatus(value: Status::Degraded);
    }

    public function down(): static
    {
        return $this->hasStatus(value: Status::Down);
    }

    public function deploying(): static
    {
        return $this->hasStatus(value: Status::Deploying);
    }

    public function rollback(): static
    {
        return $this->hasStatus(value: Status::Rollback);
    }

    public function terminated(): static
    {
        return $this->hasStatus(value: Status::Terminated);
    }
}
