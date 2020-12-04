<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('admin.welcome');
});

// Route::get('/', function()
// {
//     return view('admin\dashboard');
// });

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/teachers',[AdminController::class,'teachers'])->name('teachers');
Route::get('/students',[AdminController::class,'students'])->name('students');
Route::get('/courses',[AdminController::class,'courses'])->name('courses');
Route::get('/coursesOffered',[AdminController::class,'coursesOffered'])->name('coursesOffered');
Route::get('/complain',[AdminController::class,'complain'])->name('complain');
Route::get('/feedback',[AdminController::class,'feedback'])->name('feedback');
Route::get('/registration',[AdminController::class,'registration'])->name('registration');



