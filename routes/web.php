<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/administrator', function () {
    return view('administrator');
});

Route::get('/applicant', function () {
    return view('applicant');
});
/*

Route::post('/login', function () {
    return view('registration_success');
});*/

Route::post('/register', function (Request $request) {
    return view('registration_success');
});


