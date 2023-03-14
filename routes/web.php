<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hospital;
use App\Http\Controllers\Home;
use App\Http\Controllers\Plan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('Hospital/index', function () {
    return view('hospitals');
});
Route::get('Home/login', function () {
    return view('login');
});
Route::get('Plan/index', function () {
    return view('plan');
});
Route::post('Home/signup' , [
    'uses' => 'Home@signup',
    ]);
// Route::post('Home/signup','
// Home@signup');
	// Route::post('Home/signup', 'Home@signup')->name('Home/signup');
Route::post('signup/{f_name}/{l_name}/{email}/{username}/{password}', [Home::class, 'signup'])->name('signup');

