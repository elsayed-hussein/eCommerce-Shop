<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin', function () {
        return view('/admin/dashboard');
    })->name('dashboard');
    Route::get('/admin/category', function () {
        return view('/admin/category');
    })->name('category');
    Route::get('/admin/product', function () {
        return view('/admin/product');
    })->name('product');
    Route::get('/admin/contacts', function () {
        return view('/admin/contacts');
    })->name('contacts');
});
