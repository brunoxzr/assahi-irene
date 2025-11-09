<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/contact-us', function () {
    return view('contact-us');
});

