<?php

use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
// use App\Models\Product;
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

Route::view('/', 'layouts.bodyhome', ['products' => Product::all()])->name('home');

Route::controller(UserController::class)->group(function () {
    Route::view('signup', 'sections.signup.formcontents', [
        'titulo' => 'Registro',
        'rutaSiguiente' => 'signup.sendCode',
        'yield' => 'email',
        'email' => null
    ])->name('signup');

    Route::get('signup/code', function () {
        $email = session('email');
        return view('sections.signup.formcontents')->with([
            'titulo' => 'Verificación de código',
            'rutaSiguiente' => 'signup.verifyCode',
            'yield' => 'code',
            'email' => $email
        ]);
    })->name('signup.code');
    Route::post('signup/code', 'sendCode')->name('signup.sendCode');

    Route::get('signup/data', function () {
        $email = session('email');
        return view('sections.signup.formcontents')->with([
            'titulo' => 'Registro',
            'rutaSiguiente' => 'signup.create',
            'yield' => 'data',
            'email' => $email
        ]);
    })->name('signup.data');
    Route::post('signup/data', 'verifyCode')->name('signup.verifyCode');

    Route::post('signup/create/', 'create')->name('signup.create');
});
