<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/homepage', [UsersController::class, 'returnHomePageWithData']);

Route::get('/registers', [UsersController::class, 'showRegistration']);
Route::post('/registers', [UsersController::class, 'registration']);

// Route::get('/viewData', [UsersController::class, 'view']);

// Route::get('/viewData/{id}', [UsersController::class, 'showGet']);
Route::get('/viewData/{id}', [UsersController::class, 'viewById']);

Route::get('/updateData/{id}', [UsersController::class, 'showUpdate']);
Route::post('/updateData/{id}', [UsersController::class, 'update']);
Route::get('/deleteData/{id}',[UsersController::class,'delete']);