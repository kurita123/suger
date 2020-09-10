<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('top', 'TopController@index')->name('top');

Route::get('home', 'HomeController@index')->name('home');
Route::post('home', 'HomeController@index');

Route::get('recipegest', 'HomeController@recipe');

Route::get('post', 'PostController@index')->name('post');

Route::post('postcomplete', 'PostController@complete');

Route::get('mypage/mypage', 'MypageController@mypage')->name('mypage');
Route::post('mypage/mypage', 'MypageController@mypage')->name('mypage');

Route::post('mypage/recipeuser', 'MypageController@recipe');

Route::post('mypage/recipechange', 'MypageController@change');

Route::post('mypage/changecomplete', 'MypageController@complete');

Route::post('mypage/delete', 'MypageController@delete');

Route::get('recipe', 'RecipeController@index');

Route::get('review', 'RecipeController@review');

Route::post('recipeguest', 'RecipeguestController@guest');

Route::get('search', 'SearchController@search');
