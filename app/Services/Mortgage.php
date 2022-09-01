<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Traits\MortgageCalculator;
use Carbon\Carbon;

class Mortgage
{
    use MortgageCalculator;

    public const MONTHS_IN_YEAR = 12;

    public function __construct(
        protected int $sizeOfTheLoan = 0,
        protected int $lengthInMonths = 0,
        protected float $interestRateOnTheLoan = 0,
        protected string $startDateOfTheLoan = "",
    ) {}

    public function setSizeOfTheLoan(int $size): void
    {
        $this->sizeOfTheLoan = $size;
    }

    public function setLengthInMonths(int $months): void
    {
        $this->lengthInMonths = $months;
    }

    public function setInterestRate(float $interest): void
    {
        $this->interestRateOnTheLoan = $interest;
    }

    public function setStartDateOfTheLoan(string $date): void
    {
        $this->startDateOfTheLoan = $date;
    }

    public function getSizeOfTheLoan(): int
    {
        return $this->sizeOfTheLoan;
    }

    public function getLengthInMonths(): int
    {
        return $this->lengthInMonths;
    }

    public function getInterestRateOnTheLoan(): float
    {
        return $this->interestRateOnTheLoan / 100;
    }

    public function getStartDateOfTheLoan(): Carbon
    {
        return $this->interestRateOnTheLoan ? Carbon::create($this->startDateOfTheLoan) : Carbon::now();
    }
}
