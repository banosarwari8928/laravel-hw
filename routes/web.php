<?php

use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});
// Route::get('add',[StudentController::class, 'addStudent']);
// Route::get('read',[StudentController::class, 'Data']);
// Route::get('where',[StudentController::class, 'where']);
// Route::get('max',[StudentController::class, 'max']);
// Route::get('min',[StudentController::class, 'min']);
// Route::get('avg',[StudentController::class, 'avg']);
// Route::get('count',[StudentController::class, 'count']);
// Route::get('id',[StudentController::class, 'id']);
// Route::get('order',[StudentController::class, 'order']);
// Route::get('update',[StudentController::class, 'update']);
Route::get('delete',[StudentController::class, 'Delete']);
Route::get('deleted',[StudentController::class, 'deleted']);
Route::get('restore',[StudentController::class, 'restore']);
// Route::get('addwithe',[StudentController::class, 'DataWithEloquent']);
// Route::get('read',[StudentController::class, 'read']);
// Route::get('students',[StudentController::class, 'viewreturn']);
Route::get('Data',[StudentController::class ,'Data']);
Route::get('FQ',[StudentController::class ,'FQ']);
Route::get('SQ',[StudentController::class ,'SQ']);

Route::prefix('student')->controller(StudentController::class)->group(function(){
    Route::get('/','viewreturn');
    Route::view('adds','Student.add');
    Route::post('create','create');
    Route::get("updated/{id}",'update');
    Route::put('edit/{$id}','edit');
});
