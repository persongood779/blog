<?php

use App\Http\Controllers\blogskuq;
use App\Http\Controllers\categoriesq;
use App\Http\Controllers\users;
use App\Http\Controllers\comment;
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


Route::get('/loginAdmin', function () {
    return view('login');
});
Route::group(['middleware' => ['web']], function () {
    // Route yang membutuhkan session
    Route::resource('/admin', blogskuq::class)->middleware('admin');
    Route::get('/', [users::class, 'pengguna']);
    Route::post('/tambahkategori', [categoriesq::class, 'store']);
    Route::get('blog/{id}', [users::class, 'blog']);
    Route::get('/kategori/{kategori}', [users::class, 'kategori']);
    Route::resource('/komentar', comment::class);
});
Route::post('/login', [users::class, 'login']);
Route::post('/logout', [users::class, 'logout']);
