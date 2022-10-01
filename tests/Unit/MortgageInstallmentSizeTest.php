<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Services\Mortgage;
use PHPUnit\Framework\TestCase;

class MortgageInstallmentSizeTest extends TestCase
{
    public function testMortgageInstallmentSize(): void
    {
        $installmentSize = (new Mortgage())
            ->setSizeOfTheLoan(300000)
            ->setLengthInMonths(360)
            ->setInterestRate(5)
            ->getInstallmentSize();

        $this->assertSame(1611.0, ceil($installmentSize));
    }
}
