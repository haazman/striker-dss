<?php

use App\Http\Controllers\LogoutController;
use App\Http\Livewire\AddStriker;
use App\Http\Livewire\Authenticate;
use App\Http\Livewire\Counter;
use App\Http\Livewire\EditCandidate;
use App\Http\Livewire\Home;
use App\Http\Livewire\ShowCandidate;
use App\Http\Livewire\ShowCandidates;
use App\Http\Livewire\ShowTeam;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Home::class);
Route::get('/add', AddStriker::class)->middleware('auth');
Route::get('/showTeam/{id}', ShowTeam::class)->middleware('auth');
Route::get('/showCandidate/{id}', ShowCandidate::class)->middleware('auth');
Route::get('/editCandidate/{id}', EditCandidate::class)->middleware('auth');
Route::get('/signin', Authenticate::class)->name('login');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

