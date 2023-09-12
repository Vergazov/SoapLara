<?php

use App\Http\Controllers\CreatePatientController;
use App\Http\Controllers\GetPatientFromMISController;
use Illuminate\Support\Facades\Route;

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


Route::get('/patients', [CreatePatientController::class, 'index'])->name('patients.index');

Route::post('/patients/create', [CreatePatientController::class, 'create'])->name('patients.create');

Route::post('/patients/get', [GetPatientFromMISController::class, 'getPatient'])->name('patients.get');

