<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $size_of_the_loan
 * @property float $interest_rate_on_the_loan
 * @property int $length_in_months
 */
class CalculatorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "size_of_the_loan" => ["required", "integer", "min:1"],
            "interest_rate_on_the_loan" => ["required", "numeric"],
            "length_in_months" => ["required", "integer", "min:1", "max:360"],
        ];
    }
}
