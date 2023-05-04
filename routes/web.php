<?php

use App\Http\Controllers\register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\main;
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

route::get('/',[main::class,'home']);
route::get('/register',[register::class,'signup']);
route::post('/register',[register::class,'register'])->name('register');

