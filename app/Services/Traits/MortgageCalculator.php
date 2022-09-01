<?php

declare(strict_types=1);

namespace App\Services\Traits;

use App\Services\Mortgage;

trait MortgageCalculator
{
    public function getInstallmentSize(): float
    {
        return ($this->getSizeOfTheLoan() * $this->getInterestRateOnTheLoan()) /
            (Mortgage::MONTHS_IN_YEAR * (1 - pow((Mortgage::MONTHS_IN_YEAR / (Mortgage::MONTHS_IN_YEAR + $this->getInterestRateOnTheLoan())), $this->getLengthInMonths())));
    }
}
