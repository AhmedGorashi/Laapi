<?php

use Illuminate\Http\Request;

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


Route::group(['middleware'=>'auth:api'],function(){
    Route::get('country','Country\CountryController@country');
    Route::get('country/{id}','Country\CountryController@countryByID');
    Route::post('country','Country\CountryController@countrySave');
    Route::delete('country/{id}','Country\CountryController@countrydelete');
    Route::post('country/{id}','Country\CountryController@countryUpdate');
});
//list Articles
Route::get('articles','ArticleController@index');
//list Single Article
Route::get('article/{id}','ArticleController@show');
//Create New Article
Route::post('article','ArticleController@store');
//Update Article
Route::put('article','ArticleController@store');
//Delete Article
Route::delete('article/{id}','ArticleController@destroy');
