<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function ($route) {
    Route::post('shorten', 'CreateURL');
    Route::get('/', 'DisplayHomepage');
    Route::get('{word}', 'RedirectShortcode');
});
