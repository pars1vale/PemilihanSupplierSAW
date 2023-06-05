<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RiwayatPembelianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\CriteriaRatingController;
use App\Http\Controllers\CriteriaWeightController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\NormalizationController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TestimoniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
    '/alternatives' => AlternativeController::class,
    '/criteriaratings' => CriteriaRatingController::class,
    '/criteriaweights' => CriteriaWeightController::class,
    '/barang' => BarangController::class,
    '/supplier' => SupplierController::class,
    '/testimoni' => TestimoniController::class,
    '/feedback' => FeedbackController::class,
    '/riwayat' => RiwayatPembelianController::class,
    '/decision' => DecisionController::class, 
    '/normalization' => NormalizationController::class,
    '/rank' => RankController::class
]);
    