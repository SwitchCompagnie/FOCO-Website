<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeBeautifierController;

Route::get('/', [CodeBeautifierController::class, 'index'])->name('beautifier.index');

Route::post('/beautify', [CodeBeautifierController::class, 'beautify'])->name('beautify.code');