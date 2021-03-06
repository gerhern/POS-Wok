<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth:sanctum', 'isAdmin'])->resource('empleados', App\Http\Controllers\EmployeeController::class)->except([
    'show']);

Route::middleware(['auth:sanctum'])->resource('horarios', App\Http\Controllers\TimeRecordController::class)->except([
    'create',
    'show',
    'edit',
    'update',
    'destroy'
    ]);