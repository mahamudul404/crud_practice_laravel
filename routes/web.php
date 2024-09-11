<?php

use App\Http\Controllers\HumanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('humans', HumanController::class);