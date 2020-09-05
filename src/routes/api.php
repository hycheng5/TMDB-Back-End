<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Task;
use App\User;
use App\Leaf;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/testPost',function(){
  return "pulled a sneaky";
});



Route::get('/get_user_leaves','UserController@getUserLeaves');
Route::post('/create_leaf','LeafController@createLeaf');
Route::delete('/delete_leaf','LeafController@deleteLeaf');
Route::post('/add_movie','UserController@addMovie');
Route::get('/get_user_movies','UserController@getUserMovies');
Route::get('/get_user_movie_by_id','UserController@getUserMovieById');
Route::post('/check_user_owns_movie','UserController@checkUserOwnsMovie');
Route::delete('/remove_movie','UserController@removeMovie');