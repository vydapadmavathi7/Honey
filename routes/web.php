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

Route::get('/', function () {
    return view('welcome');
});

Route::view('users','livewire.home');
Route::view('rolls','livewire.hm');
Route::view('categories','livewire.hom');
Route::view('rolls1','livewire.hm1');
Route::view('rolls2','livewire.hm2');
Route::view('rolls3','livewire.hm3');
Route::view('rolls4','livewire.hm4');
Route::view('rolls5','livewire.hm5');
Route::view('rolls6','livewire.hm6');
Route::view('rolls7','livewire.hm7');