<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\toolsController;
use App\Http\Controllers\UserController;
use App\Http\Models\toolModel;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/tools', [toolsController::class, 'getAllTool']);
Route::get('/tool/{tags}', [toolsController::class, 'getTool']);
Route::post('tool', [toolsController::class, 'createTool']);
Route::get('/tool/{id}', [toolsController::class, 'updateTool']);
Route::delete('/tools/{id}', [toolsController::class, 'deleteTool']);

/*

Route::get('students', 'ApiController@getAllStudents');
Route::get('students/{id}', 'ApiController@getStudent');
//Route::get('tools', 'toolsController@getAllTool');
Route::put('students/{id}', 'ApiController@updateStudent');
Route::delete('students/{id}','ApiController@deleteStudent');


Route::post('tool', 'toolsController@createTool');
*/