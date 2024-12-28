<?php

use App\Http\Controllers\Language\LangagueSwitchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/switch-language/{locale}', [LangagueSwitchController::class, 'switch'])->name('locale.switch');
