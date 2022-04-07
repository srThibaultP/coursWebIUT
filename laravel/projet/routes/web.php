<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('tickets', [TicketsController::class, 'show']);

Route::get('tickets/create', function () {
    return view('tickets/create');
});

Route::post('tickets/create', [TicketsController::class, 'create']);

Route::get('tickets/liste', [TicketsController::class, 'show']);

Route::get('tickets/modify', [TicketsController::class, 'edit']);

Route::post('tickets/modify', [TicketsController::class, 'edit']);

Route::post('tickets/updating', [TicketsController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
