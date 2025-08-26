<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return redirect()->route('school-classes.index');
});

Route::resource('school-classes', SchoolClassController::class);
Route::resource('students', StudentController::class);
Route::resource('attendances', AttendanceController::class);
