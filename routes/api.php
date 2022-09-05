<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\toolsController;
use App\Http\Controllers\UserController;
use App\Http\Models\toolModel;
use App\Http\Models\toolTags;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix"=>"tool"],function(){

Route::get('/tools', [toolsController::class, 'getAllTool']);
Route::get('/tools/{tags}', [toolsController::class, 'getTool']);
Route::post('tools/', [toolsController::class, 'createTool']);
Route::delete('/tools/{id}', [toolsController::class, 'deleteTool']);

});

