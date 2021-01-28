<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


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
//ADMIN
Route::get('/', function () {
    return view('admin.welcome');
});

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/teachers',[AdminController::class,'teachers'])->name('teachers');
Route::get('/students',[AdminController::class,'students'])->name('students');
Route::get('/courses',[AdminController::class,'courses'])->name('courses');
Route::get('/coursesOffered',[AdminController::class,'coursesOffered'])->name('coursesOffered');
Route::get('/complain',[AdminController::class,'complain'])->name('complain');
Route::get('/feedback',[AdminController::class,'feedback'])->name('feedback');
Route::get('/registration',[AdminController::class,'registration'])->name('registration');

Route::post('/searchteacher',[AdminController::class,'searchteacher'])->name('searchteacher');
Route::post('/delteacher',[AdminController::class,'delteacher'])->name('delteacher');
Route::post('/removeStudent',[AdminController::class,'removeStudent'])->name('removeStudent');
Route::post('/updateCourseStatus',[AdminController::class,'updateCourseStatus'])->name('updateCourseStatus');
Route::post('/removeCourse',[AdminController::class,'removeCourse'])->name('removeCourse');
Route::post('/updateOfferStatus',[AdminController::class,'updateOfferStatus'])->name('updateOfferStatus');
Route::post('/removeOffer',[AdminController::class,'removeOffer'])->name('removeOffer');


//TEACHERS

Route::get('/dashboardForTeacher',[TeachersController::class,'dashboard'])->name('dashboardForTeacher');
Route::get('/profile',[TeachersController::class,'profile'])->name('profile');
Route::get('/courseOfferedForTeacher',[TeachersController::class,'courseOffered'])->name('courseOfferedForTeacher');
Route::get('/coursesForTeacher',[TeachersController::class,'courses'])->name('coursesForTeacher');
Route::get('/feedbackForTeacher',[TeachersController::class,'feedback'])->name('feedbackForTeacher');
Route::get('/quiz',[TeachersController::class,'quiz'])->name('quiz');
Route::get('/qualification',[TeachersController::class,'qualification'])->name('qualification');
Route::get('/marks',[TeachersController::class,'marks'])->name('marks');

Route::post('/getdata',[TeachersController::class,'getdata'])->name('getdata');
Route::post('/removeQualification',[TeachersController::class,'removeQualification'])->name('removeQualification');
Route::post('/checkQualification',[TeachersController::class,'checkQualification'])->name('checkQualification');
Route::post('/checkField',[TeachersController::class,'checkField'])->name('checkField');
Route::post('/checkInstitute',[TeachersController::class,'checkInstitute'])->name('checkInstitute');
Route::post('/addQualification',[TeachersController::class,'addQualification'])->name('addQualification');
Route::post('/addcourse',[TeachersController::class,'addCourse'])->name('addcourse');
Route::post('/delcourse',[TeachersController::class,'delCourse'])->name('delcourse');
Route::post('/addquiz',[TeachersController::class,'addQuiz'])->name('addquiz');
Route::post('/removequiz',[TeachersController::class,'removeQuiz'])->name('removequiz');
Route::post('/endregistration',[TeachersController::class,'endRegistration'])->name('endregistration');
Route::get('/changeQualification',[TeachersController::class,'changeQualification'])->name('changeQualification');

//students
Route::get('/',[UserController::class,'index'])->name('homepage');
Route::get('/course',[UserController::class,'courses'])->name('course');
Route::get('/teacher',[UserController::class,'teachers'])->name('teacher');
Route::get('/teacherprofile/{id}',[UserController::class,'profile'])->name('teacherprofile');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::get('/courseteacher/{id}',[UserController::class,'courseteachers'])->name('courseteacher');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::post('/addReg',[UserController::class,'addReg'])->name('addReg');

//login
Route::post('/checkSignIn',[LoginController::class,'checkSignIn'])->name('checkSignIn');
Route::post('/checkLogin',[LoginController::class,'checkLogin'])->name('checkLogin');


