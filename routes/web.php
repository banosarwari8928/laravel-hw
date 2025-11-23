<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('add',[StudentController::class, 'addStudent']);
Route::get('read',[StudentController::class, 'Data']);
Route::get('where',[StudentController::class, 'where']);
Route::get('max',[StudentController::class, 'max']);
Route::get('min',[StudentController::class, 'min']);
Route::get('avg',[StudentController::class, 'avg']);
Route::get('count',[StudentController::class, 'count']);
Route::get('id',[StudentController::class, 'id']);
Route::get('order',[StudentController::class, 'order']);
Route::get('update',[StudentController::class, 'update']);
Route::get('delete',[StudentController::class, 'delete']);

