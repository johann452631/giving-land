<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Utilities\Utility;
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

// Route::view('/', 'welcome');

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
    Utility::sendAlert('advertencia','funciona por fin');
    return view('vp');
});

Route::get('/p2',function(){
    return session()->all();
});

Route::view('vp', 'prueba');

Route::controller(AppController::class)->group(function(){
    Route::get('/','init')->name('home');

    Route::get('/login','login')->name('app.login');

    Route::post('/auth','auth')->name('app.auth');

    Route::post('/logout','logout')->name('app.logout');

    Route::get('/signup','signup')->name('app.signup');

    Route::post('/signup','signupSendCode')->name('app.signupSendCode');

    Route::get('/signup/code','signupCode')->name('app.signupCode');

    Route::post('/signup/code','signupVerifyCode')->name('app.signupVerifyCode');

    Route::get('/settings','settings')->name('app.settings');
});

Route::resource('users.products',ProductController::class);

Route::resource('users', UserController::class);