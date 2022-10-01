<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CalculatorRequest;
use App\Services\Mortgage;
use Inertia\Response;

class CalculatorController extends Controller
{
    public function index(): Response
    {
        return inertia("Calculator");
    }

    public function calculate(CalculatorRequest $request, Mortgage $mortgage): Response
    {
        $installmentSize = $mortgage->setSizeOfTheLoan($request->size_of_the_loan)
            ->setLengthInMonths($request->length_in_months)
            ->setInterestRate($request->interest_rate_on_the_loan)
            ->getInstallmentSize();

        return inertia("Calculator")
            ->with([
                "installment" => ceil($installmentSize),
                "success" => "success",
            ]);
    }
}
