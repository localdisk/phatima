<?php

declare(strict_types=1);

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\LoginForm;
use App\Http\Livewire\RegisterForm;
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

Route::get('/register', RegisterForm::class)->name('register');
Route::get('/login', LoginForm::class)->name('login');
Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('auth');
