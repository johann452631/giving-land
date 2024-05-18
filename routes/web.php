<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ChangeEmailController;
use App\Http\Controllers\CodeValidationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\Image;
use App\Models\Profile;
use App\Models\User;
use App\MyOwn\classes\Utility;
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
    // return view('vp')->fragment('dos');
});

Route::get('/', function () {
    return to_route('home');
});

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();
    // dd($user_google);
    $user = User::updateOrCreate([
        'email' => $user_google->email,
    ], [
        'name' => $user_google->name,
        'email' => $user_google->email,
        'google_id' => $user_google->id,
    ]);

    $user->update(['username' => str_replace(" ", "_", strtolower($user->name)) . "_" . $user->id]);

    $profile = Profile::updateOrCreate([
        'user_id' => $user->id
    ]);

    Image::updateOrCreate([
        'imageable_id' => $profile->id,
        'imageable_type' => Profile::class
    ],[
        'url' => $user_google->avatar,
        // 'imageable_id' => $profile->id,
        // 'imageable_type' => Profile::class
    ]);
    Auth::login($user);
    Session()->regenerate();
    Utility::sendAlert('success','Se ingresó con su cuenta de Google');
    return to_route('home');
});

Route::controller(AppController::class)->group(function () {
    Route::get('/posts/{category?}', 'home')->name('home');
    Route::post('/logout', 'logout')->name('app.logout');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login/index', 'index')->name('login.index');
    Route::post('/login/authenticate', 'authenticate')->name('login.authenticate');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/reset-password', 'index')->name('resetPassword.index');
    Route::post('/reset-password/send-code', 'sendCode')->name('resetPassword.sendCode');
    Route::get('/reset-password/code-form/{token}', 'codeForm')->name('resetPassword.codeForm');
    Route::post('/reset-password/verify-code', 'verifyCode')->name('resetPassword.verifyCode');
    Route::get('/reset-password/new-password-form/{token}', 'newPasswordForm')->name('resetPassword.newPasswordForm');
    Route::post('/reset-password/save-new-password', 'saveNewPassword')->name('resetPassword.saveNewPassword');
});

Route::controller(SignupController::class)->group(function () {
    Route::get('/signup/index', 'index')->name('signup.index');
    Route::post('/signup/send-code', 'sendCode')->name('signup.sendCode');
    Route::get('/signup/code-form/{token}','codeForm')->name('signup.codeForm');
    Route::post('/signup/verify-code', 'verifyCode')->name('signup.verifyCode');
});

Route::get('users/create/{token}',[UserController::class,'create'])->name('users.create');

Route::get('users/security-privacy',[UserController::class,'securityPrivacy'])->name('users.securityPrivacy');

Route::resource('users', UserController::class)->only(['store','update','destroy']);

// Route::controller(ChangeEmailController::class)->group(function () {
//     Route::get('/users/{username}/edit-email', 'index')->name('changeEmail.index');
//     Route::post('/users/edit-email/send-code', 'sendCode')->name('changeEmail.sendCode');
//     Route::get('/users/{username}/edit-email/code-form', 'codeForm')->name('changeEmail.codeForm');
//     Route::get('/users/edit-email/change', 'change')->name('changeEmail.change');
// });

Route::get('{username}', [ProfileController::class,'show'])->name('profile.show');

Route::singleton('profile', ProfileController::class)->except('show');

// Route::resource('favorites', FavoriteController::class)->only(['index']);

// Route::resource('settlements', SettlementController::class)->only(['index']);