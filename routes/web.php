<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use Illuminate\Http\Request;

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

// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

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

    // admin routes
    Route::get('/admin', [adminController::class, 'index'])->name('dashboard');

    // admin category routes
    Route::get('/admin/category', [categoryController::class, 'index'])->name('category');
    Route::get('/admin/category/main', [categoryController::class, 'mainCategory_index'])->name('getMainCategory');
    Route::post('/admin/category/main', [categoryController::class, 'mainCategory_store'])->name('saveMainCategory');
    Route::get('/admin/category/main/{mainCategory}', [categoryController::class, 'mainCategory_show'])->name('showMainCategory');
    Route::put('/admin/category/main', [categoryController::class, 'mainCategory_update'])->name('updateMainCategory');
    Route::get('/admin/category/sub', [categoryController::class, 'subCategory_index'])->name('getSubCategory');
    Route::post('/admin/category/sub', [categoryController::class, 'subCategory_store'])->name('saveSubCategory');

    // admin product routes
    Route::get('/admin/product', function () {
        return view('/admin/product');
    })->name('product');

    // admin contacts routes
    Route::get('/admin/contacts', [adminController::class, 'contact_index'])->name('contacts');
    Route::post('/admin/contacts_update', [adminController::class, 'contact_update'])->name('update_contacts');
    Route::post('/admin/contacts', [adminController::class, 'contact_store'])->name('save_contacts');
});
