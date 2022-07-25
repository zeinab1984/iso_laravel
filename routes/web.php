<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});
//    ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')->group(function () {
    Route::get('/posts',[PostController::class,'index'])->name('posts.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/assignment/{user}', [UserController::class, 'roleAssignment'])->name('users.assignment');
    Route::post('/store/{user}', [UserController::class, 'roleStore'])->name('users.role.store');
    Route::get('/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});



Route::prefix('profile')->group(function () {
    Route::get('/', [FileController::class, 'createForm'])->name('profile.createForm');
    Route::post('/update/{user}', [FileController::class, 'update'])->name('profile.update');
    Route::post('/fileUpload', [FileController::class, 'fileUpload'])->name('profile.fileUpload');
});

Route::prefix('categories')->group(function (){
    Route::get('/',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::post('/update/{category}',[CategoryController::class,'update'])->name('categories.update');
    Route::get('/destroy/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
});

Route::prefix('posts')->group(function (){
    Route::get('/',[PostController::class,'index'])->name('posts.index');
    Route::get('/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/store',[PostController::class,'store'])->name('posts.store');
    Route::get('/edit/{post}',[PostController::class,'edit'])->name('posts.edit');
    Route::post('/update/{post}',[PostController::class,'update'])->name('posts.update');
    Route::get('/destroy/{post}',[PostController::class,'destroy'])->name('posts.destroy');
});


Route::prefix('comments')->group(function (){
    Route::get('/',[CommentController::class,'index'])->name('comments.index');
    Route::get('/edit/{comment}',[CommentController::class,'edit'])->name('comments.edit');
    Route::post('/update/{comment}',[CommentController::class,'update'])->name('comments.update');
    Route::get('/destroy/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');
});


Route::get('/', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signout'])->name('signout');
