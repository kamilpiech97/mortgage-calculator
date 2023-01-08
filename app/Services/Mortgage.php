<?php

declare(strict_types=1);

namespace App\Services;

class Mortgage
{
    public const MONTHS_IN_YEAR = 12;

    public function __construct(
        protected int $sizeOfTheLoan = 0,
        protected int $lengthInMonths = 0,
        protected float $interestRateOnTheLoan = 0,
    ) {}

    public function setSizeOfTheLoan(int $size): self
    {
        $this->sizeOfTheLoan = $size;

        return $this;
    }

    public function setLengthInMonths(int $months): self
    {
        $this->lengthInMonths = $months;

        return $this;
    }

    public function setInterestRate(float $interest): self
    {
        $this->interestRateOnTheLoan = $interest;

        return $this;
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

    public function getInstallmentSize(): float
    {
        return ($this->getSizeOfTheLoan() * $this->getInterestRateOnTheLoan())
            / (self::MONTHS_IN_YEAR * (1 - ((self::MONTHS_IN_YEAR / (self::MONTHS_IN_YEAR + $this->getInterestRateOnTheLoan())) ** $this->getLengthInMonths())));
    }

    public function getPossibleInstallmentSizes(): array
    {
        $installments["{$this->interestRateOnTheLoan}"] = ceil($this->getInstallmentSize());

        for ($i = $this->interestRateOnTheLoan + 10.0; $i > 0; $i = $i - 2.0) {
            $this->interestRateOnTheLoan = $i;

            $installments["{$this->interestRateOnTheLoan}"] = ceil($this->getInstallmentSize());
        }

        return $installments;
    }
}
