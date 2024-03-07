<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessoriesController;     use App\Models\Accessories;
use App\Http\Controllers\ConditionController;       use App\Models\Condition;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get  ('/accessories/create',     [AccessoriesController::class,'create']);
Route::get  ('/accessories/index',      [AccessoriesController::class, 'index']);
Route::get  ('/accessories/delete/{id}',[AccessoriesController::class, 'delete']);
Route::get  ('/accessories/edit/{id}',  [AccessoriesController::class, 'edit']);
Route::post ('/accessories/update/{id}',[AccessoriesController::class, 'update']);
Route::post ('/accessories/store',      [AccessoriesController::class, 'store']);

oute::get   ('/condition/create',       [ConditionController::class,'create']);
Route::get  ('/condition/index',        [ConditionController::class, 'index']);
Route::get  ('/condition/delete/{id}',  [ConditionController::class, 'delete']);
Route::get  ('/condition/edit/{id}',    [ConditionController::class, 'edit']);
Route::post ('/condition/update/{id}',  [ConditionController::class, 'update']);
Route::post ('/condition/store',        [ConditionController::class, 'store']);
