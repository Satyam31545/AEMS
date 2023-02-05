<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mycon;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FamilyController;
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
Route::get('/', [Mycon::class, 'login']);
Route::post('/login', [Mycon::class, 'login_p']);
Route::get('/view', [Mycon::class, 'view'])->middleware('login');
Route::get('/update', [Mycon::class, 'update'])->middleware('login');
Route::post('/update', [Mycon::class, 'p_update'])->middleware('login');
Route::get('/logout', [Mycon::class, 'logout']);
Route::get('/error', [Mycon::class, 'error']);
Route::resource('employee', EmployeeController::class)->middleware('role','login');
Route::resource('family', FamilyController::class)->only([
    'create','store'
    ])->middleware('login','role');
Route::resource('education', EducationController::class)->only([
    'create','store'
    ])->middleware('login','role');


// Route::get('/', function () {
//     return view('welcome');
// });
