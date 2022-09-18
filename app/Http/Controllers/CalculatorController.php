<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Mortgage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class CalculatorController extends Controller
{
    public function index(): Response
    {
        return inertia("Calculator");
    }

    public function calc(Request $request, Mortgage $mortgage): Response
    {
        $mortgage->setSizeOfTheLoan($request->sizeOfTheLoan);
        $mortgage->setLengthInMonths($request->lengthInMonths);
        $mortgage->setInterestRate($request->interestRateOnTheLoan);
//        dd($mortgage->getInstallmentSize());

        return inertia("Calculator")
            ->with(["installment" => $mortgage->getInstallmentSize(),
                "success" => "success"]);
    }
}
