<?php

declare(strict_types=1);

namespace App\Services;

use Carbon\Carbon;

class CalculationService
{
    public function loanCalculation($amountOfTheLoan, $interest, $monthsInYear, $numberOfInstallments)
    {
        $now = Carbon::now();
        $installment = $this->installmentCalculation($amountOfTheLoan, $interest, $monthsInYear, $numberOfInstallments);
        $baseInstallment =  $this->installmentCalculation($amountOfTheLoan, 5.95, $monthsInYear, $numberOfInstallments);;
        for ($i = 0; $i <= 360; $i++)
        {
            echo "Month $i: ".number_format($installment, 2, ',', ' ');
            $odsetki = $this->odsetkiCalculation($amountOfTheLoan, $interest, $now->daysInMonth, $now->daysInYear);
            echo " interest: ".number_format($odsetki, 2, ',', ' ');
            $amountOfTheLoan = $amountOfTheLoan - ($installment - $odsetki);
            echo " capital: ".number_format($installment-$odsetki, 2, ',', ' ');
            echo " amount of loan: ".number_format($amountOfTheLoan, 2, ',', ' ');
            echo "<br>";

            if ($i === 12) {
                $interest = 5.95;
                $installment = $this->installmentCalculation($amountOfTheLoan, $interest, $monthsInYear, $numberOfInstallments);

            }
            if ($i === 18){
                $amountOfTheLoan = $amountOfTheLoan - 12000.00;
                $installment = $this->installmentCalculation($amountOfTheLoan, $interest, $monthsInYear, $numberOfInstallments);
            }
            if ($i > 9){
                $amountOfTheLoan = $amountOfTheLoan - (($baseInstallment - $installment) + 400.00);
                $installment = $this->installmentCalculation($amountOfTheLoan, $interest, $monthsInYear, $numberOfInstallments);
            }
            $now->addMonth();
            $numberOfInstallments--;
        }

    }

    public function installmentCalculation($amountOfTheLoan, $interest, $monthsInYear, $numberOfInstallments): float|int
    {

        $installment = ($amountOfTheLoan * $this->getInterest($interest)) /
            ($monthsInYear * (1 - pow(($monthsInYear / ($monthsInYear + $this->getInterest($interest))), $numberOfInstallments)));

        return $installment;
    }

    private function odsetkiCalculation($amountOfTheLoan, $interest, $daysInMonth, $daysInYear): float|int
    {
        return $amountOfTheLoan*$this->getInterest($interest)*$daysInMonth/$daysInYear;
    }

    private function getInterest($interest){
        return $interest/100;
    }

}
