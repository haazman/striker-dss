<?php

use App\Http\Livewire\Authenticate;
use App\Http\Livewire\Counter;
use App\Http\Livewire\Home;
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
Route::get('/count', Counter::class);
Route::get('/signin', Authenticate::class);

