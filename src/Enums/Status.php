<?php

declare(strict_types=1);

namespace Shergela\Searchable\Enums;

enum Status: string
{
    // -------------------------------------------------------------------------
    // General — users, posts, products, any record
    // -------------------------------------------------------------------------

    case Active = 'active';
    case Inactive = 'inactive';
    case Deleted = 'deleted';
    case Archived = 'archived';
    case Draft = 'draft';
    case Suspended = 'suspended';
    case Blocked = 'blocked';
    case Locked = 'locked';
    case Hidden = 'hidden';
    case Paused = 'paused';
    case Enabled = 'enabled';
    case Disabled = 'disabled';

    // -------------------------------------------------------------------------
    // Workflow / Lifecycle — tasks, tickets, jobs, pipelines
    // -------------------------------------------------------------------------

    case Pending = 'pending';
    case InProgress = 'in_progress';
    case OnHold = 'on_hold';
    case Scheduled = 'scheduled';
    case Processing = 'processing';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
    case Failed = 'failed';
    case Expired = 'expired';
    case Skipped = 'skipped';
    case Retrying = 'retrying';
    case TimedOut = 'timed_out';

    // -------------------------------------------------------------------------
    // Review / Approval — moderation, content approval flows
    // -------------------------------------------------------------------------

    case PendingReview = 'pending_review';
    case UnderReview = 'under_review';
    case Approved = 'approved';
    case Disapproved = 'disapproved';
    case Rejected = 'rejected';
    case Flagged = 'flagged';
    case Escalated = 'escalated';

    // -------------------------------------------------------------------------
    // Content Publishing — articles, blog posts, products
    // -------------------------------------------------------------------------

    case Published = 'published';
    case Unpublished = 'unpublished';
    case Featured = 'featured';

    // -------------------------------------------------------------------------
    // Order / E-commerce — order lifecycle tracking
    // -------------------------------------------------------------------------

    case PendingPayment = 'pending_payment';
    case Paid = 'paid';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
    case Received = 'received';
    case Returned = 'returned';
    case Open = 'open';
    case Closed = 'closed';

    // -------------------------------------------------------------------------
    // Payment / Refund — invoices, transactions, disputes
    // -------------------------------------------------------------------------

    case Refunded = 'refunded';
    case PartiallyRefunded = 'partially_refunded';
    case RefundedPartially = 'refunded_partially';
    case RefundedFully = 'refunded_fully';
    case PartiallyPaid = 'partially_paid';
    case Chargeback = 'chargeback';
    case Disputed = 'disputed';
    case Overdue = 'overdue';

    // -------------------------------------------------------------------------
    // Record Change / Audit — logs, history, audit trails
    // -------------------------------------------------------------------------

    case Created = 'created';
    case Updated = 'updated';
    case Changed = 'changed';
    case Corrected = 'corrected';
    case Restored = 'restored';
    case Replaced = 'replaced';
    case Merged = 'merged';
    case Synced = 'synced';
    case Imported = 'imported';
    case Exported = 'exported';
    case Migrated = 'migrated';

    // -------------------------------------------------------------------------
    // Print / Document — invoices, labels, receipts
    // -------------------------------------------------------------------------

    case Printed = 'printed';
    case Reprinted = 'reprinted';
    case Signed = 'signed';
    case Stamped = 'stamped';

    // -------------------------------------------------------------------------
    // User / Account — authentication, registration, account lifecycle
    // -------------------------------------------------------------------------

    case Verified = 'verified';
    case Unverified = 'unverified';
    case Banned = 'banned';
    case Deactivated = 'deactivated';
    case PendingDelete = 'pending_delete';
    case Invited = 'invited';
    case Registered = 'registered';

    // -------------------------------------------------------------------------
    // System / Infrastructure — jobs, services, deployments, health checks
    // -------------------------------------------------------------------------

    case Running = 'running';
    case Stopped = 'stopped';
    case Queued = 'queued';
    case Idle = 'idle';
    case Healthy = 'healthy';
    case Degraded = 'degraded';
    case Down = 'down';
    case Deploying = 'deploying';
    case Rollback = 'rollback';
    case Terminated = 'terminated';
}
