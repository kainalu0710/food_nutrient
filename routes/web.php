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

Route::get('/list', 'App\Http\Controllers\FoodNutrientController@index');
// Route::get('/list', 'App\Http\Controllers\FoodNutrientController@serch');
Route::get('/{id}/detail', 'App\Http\Controllers\FoodNutrientController@detail');
