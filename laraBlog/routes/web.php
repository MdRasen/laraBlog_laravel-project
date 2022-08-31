<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\postController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', [dashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/create-category', [categoryController::class,'create'])->name('admin.create-category');
    Route::post('/create-category', [categoryController::class,'createSubmit'])->name('admin.create-category');
    Route::get('/view-category', [categoryController::class,'view'])->name('admin.view-category');
    Route::get('/edit-category/{category_id}', [categoryController::class,'edit'])->name('admin.edit-category');
    Route::post('/edit-category/{category_id}', [categoryController::class,'editSubmit'])->name('admin.edit-category');
    Route::get('/delete-category/{category_id}', [categoryController::class,'delete'])->name('admin.delete-category');

    //

    Route::get('/create-post', [postController::class,'create'])->name('admin.create-post');
    Route::post('/create-post', [postController::class,'createSubmit'])->name('admin.create-post');
    Route::get('/view-post', [postController::class,'view'])->name('admin.view-post');
    Route::get('/edit-post/{post_id}', [postController::class,'edit'])->name('admin.edit-post');
    Route::post('/edit-post/{post_id}', [postController::class,'editSubmit'])->name('admin.edit-post');
    Route::get('/delete-post/{post_id}', [postController::class,'delete'])->name('admin.delete-post');
});