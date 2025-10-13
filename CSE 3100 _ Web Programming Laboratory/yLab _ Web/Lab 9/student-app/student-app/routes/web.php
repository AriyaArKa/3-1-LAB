<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/student/create',[StudentController::class,'create'])->name('student.create');
Route::post('/student/create',[StudentController::class,'store'])->name('student.store');
Route::get('/student/index',[StudentController::class,'index'])->name('student.index');
Route::delete('/student/{student}',[StudentController::class,'destroy'])->name('student.destroy');
Route::get('/student/{student}/edit',[StudentController::class,'edit'])->name('student.edit');
Route::put('/student/{student}/edit',[StudentController::class,'update'])->name('student.update');



Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/registerSave', [UserController::class, 'register'])->name('registerSave');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

