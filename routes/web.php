<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

Route::get('/', function () {
    return view('dashboard');
});

// Multi-step loan application flow
Route::get('/apply/phone', [ApplicationController::class, 'phoneForm'])->name('application.phone');
Route::post('/apply/phone', [ApplicationController::class, 'phoneSubmit'])->name('application.phone.submit');

Route::get('/apply/personal', [ApplicationController::class, 'personalForm'])->name('application.personal');
Route::post('/apply/personal', [ApplicationController::class, 'personalSubmit'])->name('application.personal.submit');

Route::get('/apply/professional', [ApplicationController::class, 'professionalForm'])->name('application.professional');
Route::post('/apply/professional', [ApplicationController::class, 'professionalSubmit'])->name('application.professional.submit');

Route::get('/apply/statement', [ApplicationController::class, 'statementForm'])->name('application.statement');
Route::post('/apply/statement', [ApplicationController::class, 'statementSubmit'])->name('application.statement.submit');

Route::get('/apply/offers', [ApplicationController::class, 'offers'])->name('application.offers');

