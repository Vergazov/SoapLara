<?php

use App\Http\Controllers\CreatePatient;
use App\Http\Controllers\GetPatient;
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



Route::get('/patients', [CreatePatient::class, 'index'])->name('patients.index');

Route::post('/patients/create', [CreatePatient::class, 'create'])->name('patients.create');

Route::post('/patients/get', [GetPatient::class, 'getPatient'])->name('get');

