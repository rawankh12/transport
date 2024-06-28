<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RequirementsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Ship_Goods_ReqController;
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

    Route::post('/create_transporting', [TransportingController::class , 'create']);
    Route::post('/update_transporting',[TransportingController::class , 'update']);
    Route::post('/destroy_transporting', [TransportingController::class , 'destroy']);

    Route::post('/accept_trip_sh', [Trip_RequestController::class , 'accept_trip_sh']);
    });
    Route::group(['middleware' => ['ChechUser']], function(){

    });
    Route::get('/index_requirements',[RequirementsController::class , 'index']);
    Route::get('/show_requirements', [RequirementsController::class , 'show']);
    Route::post('/create_requirements', [RequirementsController::class , 'create']);
    Route::post('/update_requirements',[RequirementsController::class , 'update']);
    Route::post('/destroy_requirements', [RequirementsController::class , 'destroy']);
    ///////////////////////////////////////
    Route::get('/index_transporting',[TransportingController::class , 'index']);
    Route::get('/show_transporting', [TransportingController::class , 'show']);
    ////////////////////////////////////////
    Route::get('/index_trip',[TripController::class , 'index']);
    Route::post('/create_trip', [TripController::class , 'create']);
    Route::post('/update_trip',[TripController::class , 'update']);
    Route::get('/show_trip', [TripController::class , 'show']);
    Route::post('/destroy_trip', [TripController::class , 'destroy']);
    /////////////////////////////////////////
    Route::get('/index_trip_r',[Trip_RequestController::class , 'index']);
    Route::post('/create_trip_r', [Trip_RequestController::class , 'create']);
    Route::post('/update_trip_r',[Trip_RequestController::class , 'update']);
    Route::get('/show_trip_r', [Trip_RequestController::class , 'show']);
    Route::post('/destroy_trip_r', [Trip_RequestController::class , 'destroy']);
    /////////////////////////////////////////
    Route::get('/show_section', [SectionController::class , 'show']);
    Route::get('/index_section',[SectionController::class , 'index']);
    /////////////////////
    Route::get('/index_t',[TripController::class , 'index_t']);
    ////////////////////////////////
    Route::post('/create_Res', [ReservationController::class , 'create']);
    Route::post('/update_Res',[ReservationController::class , 'update']);
    Route::post('/index_Res', [ReservationController::class , 'index']);
    Route::post('/show_Res',[ReservationController::class , 'show']);
    Route::post('/destroy_Res', [ReservationController::class , 'destroy']);
    ///////////////
    Route::post('/searchbysection', [TripController::class , 'searchbysection']);
    Route::post('/searchbydate', [TripController::class , 'searchbydate']);
    Route::post('/searchbytime', [TripController::class , 'searchbytime']);
    Route::post('/trip_res', [TripController::class , 'trip_res']);
    ////////////////////////////////
    Route::post('/create_ship', [Ship_Goods_ReqController::class , 'create']);
    Route::post('/update_ship',[Ship_Goods_ReqController::class , 'update']);
    Route::get('/index_ship', [Ship_Goods_ReqController::class , 'index']);
    Route::get('/show_ship',[Ship_Goods_ReqController::class , 'show']);
    Route::post('/destroy_ship', [Ship_Goods_ReqController::class , 'destroy']);



});
