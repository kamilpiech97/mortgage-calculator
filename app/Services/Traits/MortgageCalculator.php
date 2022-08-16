<?php

declare(strict_types=1);

namespace App\Services\Traits;

trait MortgageCalculator
{
    public function getInstallmentSize(): float
    {
        return ($this->getSizeOfTheLoan() * $this->getInterestRateOnTheLoan()) /
            (self::MONTHS_IN_YEAR * (1 - pow((self::MONTHS_IN_YEAR / (self::MONTHS_IN_YEAR + $this->getInterestRateOnTheLoan())), $this->getLengthInMonths())));
    }
}
