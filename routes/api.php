<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RequirementsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TransportingController;
use App\Http\Controllers\Trip_RequestController;
use App\Http\Controllers\TripController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class , 'register']);
Route::post('/login', [AuthController::class , 'login']);
Route::post('/logout', [AuthController::class , 'logout']);
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::group(['middleware' => ['CheckAdmin']], function(){

    Route::post('/create_section', [SectionController::class , 'create']);
    Route::post('/update_section', [SectionController::class , 'update']);

    Route::post('/destroy_section', [SectionController::class , 'destroy']);
    });
    Route::group(['middleware' => ['ExpetOwner']], function(){

    });
    Route::post('/index_requirements',[RequirementsController::class , 'index']);
    Route::post('/create_requirements', [RequirementsController::class , 'create']);
    Route::post('/update_requirements',[RequirementsController::class , 'update']);
    Route::post('/show_requirements', [RequirementsController::class , 'show']);
    Route::post('/destroy_requirements', [RequirementsController::class , 'destroy']);
    ///////////////////////////////////////
    Route::post('/index_transporting',[TransportingController::class , 'index']);
    Route::post('/create_transporting', [TransportingController::class , 'create']);
    Route::post('/update_transporting',[TransportingController::class , 'update']);
    Route::post('/show_transporting', [TransportingController::class , 'show']);
    Route::post('/destroy_transporting', [TransportingController::class , 'destroy']);
    ////////////////////////////////////////
    Route::post('/index_trip',[TripController::class , 'index']);
    Route::post('/create_trip', [TripController::class , 'create']);
    Route::post('/update_trip',[TripController::class , 'update']);
    Route::post('/show_trip', [TripController::class , 'show']);
    Route::post('/destroy_trip', [TripController::class , 'destroy']);
    /////////////////////////////////////////
    Route::post('/index_trip_r',[Trip_RequestController::class , 'index']);
    Route::post('/create_trip_r', [Trip_RequestController::class , 'create']);
    Route::post('/update_trip_r',[Trip_RequestController::class , 'update']);
    Route::post('/show_trip_r', [Trip_RequestController::class , 'show']);
    Route::post('/destroy_trip_r', [Trip_RequestController::class , 'destroy']);
    /////////////////////////////////////////
    Route::post('/show_section', [SectionController::class , 'show']);
    Route::post('/index_section',[SectionController::class , 'index']);
    /////////////////////
    Route::post('/index_t',[TripController::class , 'index']);
    Route::post('/create_Res', [ReservationController::class , 'create']);
    Route::post('/update_Res',[ReservationController::class , 'update']);

});
