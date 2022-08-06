<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SenderController;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('throttle:6')->group(function () {
    Route::apiResources([
        'sender' => SenderController::class,
    ]);
    Route::apiResources([
        'agent' => AgentsController::class,
    ]);
    Route::apiResources([
        'packages' => PackagesController::class,
    ]);
    Route::apiResources([
        'categories' => CategoryController::class,
    ]);
});
