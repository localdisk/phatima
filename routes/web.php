<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\LogoutController;
use App\Livewire\Admin\Login as AdminLogin;
use App\Livewire\Admin\NewPassword;
use App\Livewire\Admin\Register;
use App\Livewire\Dashboard;
use App\Livewire\PasswordReset;
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
Route::get('/', function () {
    return 'home';
})->name('home');

Route::prefix('admin')->group(function () {

    // ユーザー登録
    Route::get('/register', Register::class)->name('register');

    // ログイン/ログアウト
    Route::get('/login', AdminLogin::class)->name('login');
    Route::post('/logout', LogoutController::class)->name('logout');

    // パスワードリセット
    Route::get('/forgot-password', PasswordReset::class)->name('password.request');
    Route::get('/reset-password/{token}', NewPassword::class)->name('password.reset');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

})->middleware([
    // 作り終わったら

]);
