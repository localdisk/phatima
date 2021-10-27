<?php

declare(strict_types=1);

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\LoginForm;
use App\Http\Livewire\RegisterForm;
use App\Http\Livewire\VerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

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

// register user
Route::get('/register', RegisterForm::class)->middleware('guest')->name('register');

// login
Route::get('/login', LoginForm::class)->middleware('guest')->name('login');
Route::get('/dashboard', Dashboard::class)->middleware('auth')->name('dashboard');

// verification email
Route::get('/email/verify', VerifyEmail::class)->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
