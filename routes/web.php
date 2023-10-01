<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\LogoutController;
use App\Livewire\Admin\EditTag;
use App\Livewire\Admin\EmailVerify;
use App\Livewire\Admin\Login as AdminLogin;
use App\Livewire\Admin\NewPassword;
use App\Livewire\Admin\Register;
use App\Livewire\Admin\RegisterPost;
use App\Livewire\Admin\RegisterTag;
use App\Livewire\Admin\TagList;
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

// メール認証
Route::get('/email/verify', EmailVerify::class)->name('verification.notice')->middleware('auth');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect(route('admin.dashboard'));
})->name('verification.verify');

Route::prefix('admin')->name('admin.')->group(function () {
    // ログイン/ログアウト
    Route::get('/login', AdminLogin::class)->name('login')->middleware('guest');

    // パスワードリセット
    Route::get('/forgot-password', PasswordReset::class)->name('password.request')->middleware('guest');
    Route::get('/reset-password/{token}', NewPassword::class)->name('password.reset')->middleware('guest');

    // ログアウト
    Route::post('/logout', LogoutController::class)->name('logout')->middleware(['auth', 'verified']);

    // ユーザー登録
    Route::get('/users/create', Register::class)->name('users.create')->middleware(['auth', 'verified']);
    // ユーザー一覧
    Route::get('/users', UserList::class)->name('users')->middleware(['auth', 'verified']);

    // ポスト登録
    Route::get('/post/create', RegisterPost::class)->name('posts.create')->middleware(['auth', 'verified']);

    // タグ登録
    Route::get('/tags/create', RegisterTag::class)->name('tags.create')->middleware(['auth', 'verified']);
    // タグリスト
    Route::get('/tags', TagList::class)->name('tags')->middleware(['auth', 'verified']);
    // タグ編集
    Route::get('/tags/{id}/edit', EditTag::class)->name('tags.edit')->middleware(['auth', 'verified']);

    Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware(['auth', 'verified']);

})->middleware([
    // 作り終わったら

]);
