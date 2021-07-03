<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\TechnologyController;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [CandidateController::class, 'index'])->name('dashboard');
    Route::resource('candidates', CandidateController::class);
    Route::resource('technologies', TechnologyController::class);
});


