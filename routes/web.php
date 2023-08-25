<?php

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
    $a = ['benin' => 'bj', 'Burkina Faso' => 'bf'];
    $countries = [['label' => 'Benin', 'value' => 'bj'], ['label' => 'Burkina Faso', 'value' => 'bf'], ['label' => 'Ghana', 'value' => 'gh'], ['label' => 'Nigeria', 'value' => 'ng'], ['label' => 'Kenya', 'value' => 'ke']];

    return view('welcome', compact('countries'));
});

Route::post('/test', function () {
    dd(request()->all());
})->name('test');
