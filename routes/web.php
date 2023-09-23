<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\LogoutController;
use App\Livewire\Admin\EmailVerify;
use App\Livewire\Admin\Login as AdminLogin;
use App\Livewire\Admin\NewPassword;
use App\Livewire\Admin\Register;
use App\Livewire\Admin\UserList;
use App\Livewire\Dashboard;
use App\Livewire\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::prefix('admin')->name('admin.')->group(function () {
    // ログイン/ログアウト
    Route::get('/login', AdminLogin::class)->name('login')->middleware('guest');

    // パスワードリセット
    Route::get('/forgot-password', PasswordReset::class)->name('password.request')->middleware('guest');
    Route::get('/reset-password/{token}', NewPassword::class)->name('password.reset')->middleware('guest');

    // ログアウト
    Route::post('/logout', LogoutController::class)->name('logout')->middleware(['auth', 'verified']);

    // ユーザー登録
    Route::get('/register', Register::class)->name('register')->middleware(['auth', 'verified']);
    // ユーザー一覧
    Route::get('/users', UserList::class)->name('users')->middleware(['auth', 'verified']);

    // メール認証
    Route::get('/email/verify', EmailVerify::class)->name('verification.notice')->middleware('auth');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect(route('dashboard'));
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

})->middleware([
    // 作り終わったら

]);
