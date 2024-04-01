<?php

use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Utilities\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('p', function () {
    // $credentials = array(
    //     'email' => 'alejoimbachihoyos@gmail.com',
    //     'password' => 'buenas'
    // );
    // Auth::attempt($credentials);
    // Auth::logout();
    // return session()->invalidate();
    return session()->all();
});

Route::view('vp', 'prueba');

Route::view('/', 'layouts.bodyhome', ['products' => Product::all()])->name('home');

Route::view('/user/profile', 'sections.autenticado.navigationsections',[
    'titulo' => 'Perfil',
    'yield' => 'profile'
])->name('user.profile');

Route::view('/user/settings', 'sections.autenticado.navigationsections',[
    'titulo' => 'Configuración',
    'yield' => 'settings'
])->name('user.settings');

Route::view('/user/newpost', 'sections.autenticado.navigationsections',[
    'titulo' => 'New post',
    'yield' => 'newpost'
])->name('user.newpost');

Route::view('signup', 'sections.signup.formcontents', [
    'titulo' => 'Registro',
    'rutaSiguiente' => 'signup.sendCode',
    'yield' => 'email',
])->name('signup');

Route::view('signup/code', 'sections.signup.formcontents', [
    'titulo' => 'Verificación de código',
    'rutaSiguiente' => 'signup.verifyCode',
    'yield' => 'code',
])->name('signup.code');

Route::view('signup/data', 'sections.signup.formcontents', [
    'titulo' => 'Registro',
    'rutaSiguiente' => 'signup.store',
    'yield' => 'data',
])->name('signup.data');

Route::controller(UserController::class)->group(function () {
    Route::post('/', 'login')->name('login');

    Route::post('signup/code', 'sendCode')->name('signup.sendCode');

    Route::post('signup/data', 'verifyCode')->name('signup.verifyCode');

    Route::post('signup/store/', 'store')->name('signup.store');
});

Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    Alert::mostrar('danger','Se cerró sesión.');
    return to_route('home');
})->name('logout');
