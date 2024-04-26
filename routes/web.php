<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ChangeEmailController;
use App\Http\Controllers\CodeValidationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Utilities\Utility;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    return bin2hex(random_bytes(16));
});

Route::get('/all', function () {
    return session()->all();
});
Route::get('/invalidate', function () {
    return session()->invalidate();
});

Route::get('/regenerate', function () {
    return session()->regenerate();
});

Route::get('/vp', function () {
    return view('vp')->fragment('dos');
});


Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();
    // dd($user_google);
    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ], [
        'username' => str_replace(" ", "_", strtolower($user_google->name)) . "_" . $user_google->id,
        'name' => $user_google->name,
        'email' => $user_google->email,
        'url_profile_img' => $user_google->avatar,
    ]);
    Auth::login($user);
    Session()->regenerate();
    Utility::sendAlert('exito','Se ingresó con su cuenta de Google');
    return to_route('home');
});

Route::controller(AppController::class)->group(function () {
    Route::get('/', 'init')->name('home');

    Route::post('/logout', 'logout')->name('app.logout');

    Route::get('/settings', 'settings')->name('app.settings');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'authenticate')->name('login.authenticate');
});

Route::controller(SignupController::class)->group(function () {
    Route::get('/signup', 'index')->name('signup.index');
    Route::post('/signup/send-code', 'sendCode')->name('signup.sendCode');
    Route::get('/signup/code-form/{token}','codeForm')->name('signup.codeForm');
    Route::post('/signup/verify-code', 'verifyCode')->name('signup.verifyCode');
});

Route::controller(CodeValidationController::class)->group(function () {
    Route::get('/code-form', 'codeForm')->name('codeValidation.codeForm');
    Route::post('/verify-code', 'verifyCode')->name('codeValidation.verifyCode');
    Route::get('/cp', 'prueba')->name('codeValidation.prueba');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/reset-password', 'emailResetPasswordForm')->name('resetPassword.emailResetPasswordForm');
    Route::post('/reset-password/send-code', 'sendResetPasswordCode')->name('resetPassword.sendResetPasswordCode');
    Route::get('/reset-password/new-password-form/{token}', 'newPasswordForm')->name('resetPassword.newPasswordForm');
    Route::post('/reset-password/save-new-password', 'saveNewPassword')->name('resetPassword.saveNewPassword');
});

Route::resource('users.products', ProductController::class);

Route::controller(ChangeEmailController::class)->group(function () {
    Route::get('/users/{username}/edit-email', 'index')->name('changeEmail.index');
    Route::post('/users/edit-email/send-code', 'sendCode')->name('changeEmail.sendCode');
    Route::get('/users/{username}/edit-email/code-form', 'codeForm')->name('changeEmail.codeForm');
    Route::get('/users/edit-email/change', 'change')->name('changeEmail.change');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users/create/{token}','create')->name('users.create')->middleware();
    Route::post('/users/store/{token}','store')->name('users.store')->middleware();
});

Route::controller(ProfileController::class)->group(function () {
    Route::put('/profile/delete-photo/{id}', 'deletePhoto')->name('profile.deletePhoto');
});

Route::resource('users', UserController::class)->except(['index','create','store'])->middleware('auth');
