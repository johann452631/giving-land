<?php

use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Query\IndexHint;
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

// Route::view('/home', 'layouts.bodyhome', ['products' => Product::all()])->name('home');
Route::get('/', function () {
    Product::factory()
        ->count(100)
        ->state(new Sequence(
            ['purpose' => 'Donación'],
            ['purpose' => 'Intercambio'],
        ))
        ->create();
    return view('layouts.bodyhome')->with('products',Product::all());
})->name('home');

Route::controller(UserController::class)->group(function () {
    Route::view('signup', 'sections.signup.formcontents', [
        'titulo' => 'Registro',
        'rutaSiguiente' => 'signup.sendCode',
        'yield' => 'email',
        'email' => null
    ])->name('signup');
    Route::post('signup/code', 'sendCode')->name('signup.sendCode');
    Route::post('signup/data', 'verifyCode')->name('signup.data');
    Route::post('signup/create/', 'create')->name('signup.create');
});
