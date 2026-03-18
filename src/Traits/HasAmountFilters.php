<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasAmountFilters
{
    use HasNumericFilters;

    public function amount(
        string $field = 'amount',
        ?float $value = null,
        string $operator = '=',
    ): static {
        $value = $this->parseFloat(field: $field, value: $value);

        if ($value === null) {
            return $this;
        }

        return $this->applyNumericFilter(field: $field, value: $value, operator: $operator);
    }

    public function amountGreaterThan(string $field = 'amount', ?float $value = null): static
    {
        $value = $this->parseFloat(field: $field, value: $value);

        return $this->applyNumericFilter(field: $field, value: $value, operator: '>');
    }

    public function amountLessThan(string $field = 'amount', ?float $value = null): static
    {
        $value = $this->parseFloat(field: $field, value: $value);

        return $this->applyNumericFilter(field: $field, value: $value, operator: '<');
    }

    public function amountBetween(
        string $field = 'amount',
        ?float $from = null,
        ?float $to = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        $from = $this->parseFloat(field: $fromInput, value: $from);
        $to = $this->parseFloat(field: $toInput, value: $to);

        return $this->applyBetween(field: $field, from: $from, to: $to);
    }

    public function amountNotBetween(
        string $field = 'amount',
        ?float $from = null,
        ?float $to = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        $from = $this->parseFloat(field: $fromInput, value: $from);
        $to = $this->parseFloat(field: $toInput, value: $to);

        return $this->applyBetween(field: $field, from: $from, to: $to, not: true);
    }

    public function amountNull(string|array $field = 'amount', string $boolean = 'and', bool $not = false): static
    {
        $this->builder->whereNull($field, $boolean, $not);

        return $this;
    }

    public function amountNotNull(string|array $field = 'amount', string $boolean = 'and'): static
    {
        $this->builder->whereNotNull($field, $boolean);

        return $this;
    }

    public function highestAmount(string $field = 'amount'): static
    {
        $this->builder->orderBy($field, 'DESC');

        return $this;
    }

    public function lowestAmount(string $field = 'amount'): static
    {
        $this->builder->orderBy($field, 'ASC');

        return $this;
    }

    // ==================== Commerce / Finance ====================

    public function totalAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'total_amount', value: $value, operator: $operator);
    }

    public function netAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'net_amount', value: $value, operator: $operator);
    }

    public function subtotalAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'subtotal_amount', value: $value, operator: $operator);
    }

    public function paidAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'paid_amount', value: $value, operator: $operator);
    }

    public function dueAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'due_amount', value: $value, operator: $operator);
    }

    public function refundAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'refund_amount', value: $value, operator: $operator);
    }

    public function discountAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'discount_amount', value: $value, operator: $operator);
    }

    public function taxAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'tax_amount', value: $value, operator: $operator);
    }

    public function shippingAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'shipping_amount', value: $value, operator: $operator);
    }

    public function feeAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'fee_amount', value: $value, operator: $operator);
    }

    public function tipAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'tip_amount', value: $value, operator: $operator);
    }

    public function penaltyAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'penalty_amount', value: $value, operator: $operator);
    }

    public function depositAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'deposit_amount', value: $value, operator: $operator);
    }

    public function withdrawalAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'withdrawal_amount', value: $value, operator: $operator);
    }

    public function creditAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'credit_amount', value: $value, operator: $operator);
    }

    public function debitAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'debit_amount', value: $value, operator: $operator);
    }

    public function bonusAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'bonus_amount', value: $value, operator: $operator);
    }

    public function cashbackAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'cashback_amount', value: $value, operator: $operator);
    }

    public function insuranceAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'insurance_amount', value: $value, operator: $operator);
    }

    // ==================== Coupon ====================

    public function couponAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'coupon_amount', value: $value, operator: $operator);
    }

    public function couponDiscountAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'coupon_discount_amount', value: $value, operator: $operator);
    }

    public function couponTaxAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'coupon_tax_amount', value: $value, operator: $operator);
    }

    public function couponShippingAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'coupon_shipping_amount', value: $value, operator: $operator);
    }

    // ==================== Betting / Gaming ====================

    public function winAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'win_amount', value: $value, operator: $operator);
    }

    public function lossAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'loss_amount', value: $value, operator: $operator);
    }

    public function stakeAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'stake_amount', value: $value, operator: $operator);
    }

    public function payoutAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'payout_amount', value: $value, operator: $operator);
    }

    // ==================== HR / Payroll ====================

    public function salary(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'salary', value: $value, operator: $operator);
    }

    public function salaryAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'salary_amount', value: $value, operator: $operator);
    }

    public function commissionAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'commission_amount', value: $value, operator: $operator);
    }

    public function overtimeAmount(?float $value = null, string $operator = '='): static
    {
        return $this->amount(field: 'overtime_amount', value: $value, operator: $operator);
    }
}
