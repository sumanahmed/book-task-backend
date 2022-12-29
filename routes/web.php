<?php

use Illuminate\Support\Facades\{ Route, Artisan };

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    return "All cache is cleared";
});