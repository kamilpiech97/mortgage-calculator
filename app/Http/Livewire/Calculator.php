<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Services\Mortgage;
use Livewire\Component;

class Calculator extends Component
{
    public int $sizeOfTheLoan = 0;
    public int $lengthInMonths = 0;
    public float $interestRateOnTheLoan = 0;
    public float $installment = 0;
    private Mortgage $mortgage;

    public function boot(Mortgage $mortgage): void
    {
        $this->mortgage = $mortgage;
    }

    public function render()
    {
        return view("livewire.calculator");
    }

    public function calc(): void
    {
        $this->mortgage->setSizeOfTheLoan($this->sizeOfTheLoan);
        $this->mortgage->setLengthInMonths($this->lengthInMonths);
        $this->mortgage->setInterestRate($this->interestRateOnTheLoan);
        $this->installment = $this->mortgage->getInstallmentSize();
    }
}
