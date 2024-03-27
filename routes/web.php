<?php

use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Http\Request;
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

// Route::view('/signup/{content}', 'sections.signup.formcontents')->name('signup');

Route::controller(UserController::class)->group(function () {
    Route::view('signup','sections.signup.formcontents',[
        'titulo' => 'Registro',
        'rutaSiguiente' => 'signup.sendCode',
        'yield' => 'email',
        'email' => null
    ])->name('signup');
    Route::post('signup/code','sendCode')->name('signup.sendCode');
    Route::post('signup/data','verifyCode')->name('signup.data');
    Route::post('signup/create/','create')->name('signup.create');
});

// Route::get('/', function () {
//     $products = Product::all();
//     return view('layouts.bodyhome')->with('products',$products);
// })->name('home');

// Route::get('/singup', function () {
//     return view('sections.signup.forms')->with('form','form-email');
// })->name('signup');