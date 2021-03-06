<?php

use App\Models\Candidate;
use App\Models\Technology;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\CandidateFilterController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\CandidateAvatarController;
use App\Http\Controllers\Admin\CandidateProjectController;
use App\Http\Controllers\Admin\CandidateDocumentController;

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
    Route::resource('candidates.projects', CandidateProjectController::class);
    Route::get('v1/technologies', function () {
        return Technology::all();
    });
    Route::resource('tags', TagController::class);
    Route::post('candidates/{candidate}/avatar', [CandidateAvatarController::class, 'store'])->name('avatar');
    Route::post('candidates/{candidate}/document', [CandidateDocumentController::class, 'store'])->name('document');
    Route::post('candidates/filter', [CandidateFilterController::class, 'index'])->name('filter');
});


