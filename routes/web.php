<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return view('home');
})->name('home');

Route::get('/get_tasks', [TaskController::class, 'getTask']);
Route::post('/create_task', [TaskController::class, 'createTask']);
Route::put('/update_task', [TaskController::class, 'updateTask']);
Route::get('/download_file', [TaskController::class, 'download_file']);