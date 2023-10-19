<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
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


Route::controller(UserProfileController::class)->group(function()
{
    Route::get('/profile', 'index')->name('index');
    Route::get('/profile/create', 'create')->name('create');
    Route::post('/profile', 'save')->name('save');
    Route::post('/send_email', 'sendEmail')->name('send_email');
});


Route::get('/', function () {
    return view('welcome');
});

