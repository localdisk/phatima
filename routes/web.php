<?php

declare(strict_types=1);

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Contracts\RegisterViewResponse;

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

    Route::get('/register', function () {
        return app(RegisterViewResponse::class);
    })->name('register');

    Route::get('/dashboard', Dashboard::class);

})->middleware([
    // 作り終わったら

]);
