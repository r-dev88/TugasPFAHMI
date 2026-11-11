<?php

use App\Http\Controllers\aboutcontroller;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\studentcontroller;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/admin/dashboard', [dashboardcontroller::class, 'index']);

Route::get('/admin/about', [aboutcontroller::class, 'index']);

Route::get('/admin/student', [studentcontroller::class, 'index']);

Route::get('/admin/classroom', [ClassroomController::class, 'index']);
Route::get('/admin/classroom/{classroom}', [ClassroomController::class, 'show'])->name('admin.classroom.show');

Route::get('/admin/subject', [SubjectController::class, 'index']);
Route::get('/admin/subjects', [SubjectController::class, 'index']);

Route::get('/admin/teacher', [TeacherController::class, 'index']);
Route::get('/admin/teachers', [TeacherController::class, 'index']);
