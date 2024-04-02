<?php

use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::get('p', function () {
    // $credentials = array(
    //     'email' => 'alejoimbachihoyos@gmail.com',
    //     'password' => 'buenas'
    // );
    // Auth::attempt($credentials);
    // Auth::logout();
    // return session()->invalidate();
    // session(['hola'=>'valor']);
    // session(['hola_timeout'=>now()->addSeconds(10)]);
    // if (now() > session('hola_timeout')) {
    //     session()->forget('hola');
    //     session()->forget('hola_timeout');
    // }
    return session()->all();
});

Route::view('vp', 'prueba');

Route::view('/home', 'layouts.bodyhome', ['products' => Product::all()])->name('home');

Route::controller(UserController::class)->group(function () {
    Route::post('/users/login', 'login')->name('login');

    Route::get('/users/{user}/profile', 'showProfile')->name('users.showProfile');

    Route::get('/users/{user}/settings', 'showSettings')->name('users.showSettings');

    Route::get('/users/{user}/newpost', 'showNewPost')->name('users.showNewPost');

    Route::get('/users/signup', 'showSignup')->name('users.showSignup');

    Route::post('/users/signup', 'signupSendCode')->name('users.signupSendCode');

    Route::get('/users/signup/code', 'showSignupCode')->name('users.showSignupCode');

    Route::post('users/signup/code', 'signupVerifyCode')->name('users.signupVerifyCode');

    Route::get('/users/signup/data', 'showSignupData')->name('users.showSignupData');

    Route::post('users/signup/data', 'store')->name('users.store');

    Route::get('users/logout', 'logout')->name('users.logout');
});

Route::resource('users', UserController::class);

