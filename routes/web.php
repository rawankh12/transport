<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SupervisorController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\SectionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('dashboard');
})->name('admin.dashboard');


Route::get('/orders', function () {
    return view('orders');
})->name('admin.orders');

Auth::routes();

Route::get('admin/overview/data', [StatisticController::class, 'getOverviewData'])->name('admin.overview.data');
Route::get('/supervisors', [SupervisorController::class, 'index'])->name('supervisors.index');
Route::get('/supervisors/create', [SupervisorController::class,'create'])->name('supervisors.create');
Route::post('/supervisors', [SupervisorController::class, 'store'])->name('supervisors.store');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/supervisors/{supervisor}', [SupervisorController::class, 'destroy'])->name('supervisors.destroy');
Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
Route::get('/sections/create', [SectionController::class,'create'])->name('sections.create');
Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
Route::post('/sections/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');
Route::get('/sections/{id}/edit',[SectionController::class, 'edit'])->name('sections.edit');
Route::post('/sections/{id}', [SectionController::class, 'update'])->name('sections.update');
