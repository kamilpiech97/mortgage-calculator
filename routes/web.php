<?php

use App\Services\Mortgage;
use Illuminate\Support\Facades\Route;
use App\Services\CalculationService;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    $calc = new Mortgage(280000, 360,4.95,"12-08-2022");
    echo $calc->getInstallmentSize();
});
