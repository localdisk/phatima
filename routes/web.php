<?php

declare(strict_types=1);

use App\Livewire\Admin\Login as AdminLogin;
use App\Livewire\Admin\Register;
use App\Livewire\Dashboard;
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

    Route::get('/register', Register::class)->name('register');
    Route::get('/login', AdminLogin::class);

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

})->middleware([
    // 作り終わったら

]);
