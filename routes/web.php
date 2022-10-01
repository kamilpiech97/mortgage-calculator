<?php

declare(strict_types=1);

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::get("/", [CalculatorController::class, "index"])->name("home");
Route::post("/", [CalculatorController::class, "calculate"]);
