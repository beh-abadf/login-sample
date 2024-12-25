<?php

use App\Http\Controllers\ProcessInformation;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'login_page');
Route::post('/', [ProcessInformation::class, 'login']);

Route::view('registration', 'registration_page');
Route::post('registration', [ProcessInformation::class, 'register']);

Route::view('forgettingpassword', 'forgetting_password');
Route::post('forgettingpassword', [ProcessInformation::class, 'handleForgottenPassword']);

Route::view('resettingpassword', 'resetting_password');
Route::post('resettingpassword', [ProcessInformation::class, 'updatePassword']);

Route::view('welcome', 'welcome_page')->middleware('auth');

Route::view('deny', 'access_denyed');

