<?php

use App\Http\Controllers\CategoryController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
//    ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix('categories')->group(function (){
    Route::get('/',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::post('/update/{category}',[CategoryController::class,'update'])->name('categories.update');
    Route::get('/destroy/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
});
