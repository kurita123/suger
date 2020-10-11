<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// ログインユーザートップ
Route::get('top', 'TopController@index')->name('top');
Route::post('top', 'TopController@index')->name('top');

// 未ログインユーザートップ
Route::get('home', 'HomeController@index')->name('home');
Route::post('home', 'HomeController@index');

// 未ログインユーザーレシピ詳細
Route::post('recipegest', 'HomeController@recipe')->name('recipegest');

// ログインユーザー投稿画面
Route::get('post', 'PostController@index')->name('post');

// 投稿完了
Route::post('postcomplete', 'PostController@complete');

// ログインマイページ
Route::get('mypage', 'MypageController@mypage')->name('mypage');
Route::post('mypage', 'MypageController@mypage')->name('mypage');

// 投稿レシピ詳細
Route::post('recipeuser', 'MypageController@recipe');

// 投稿レシピ変更
Route::get('recipechange', 'MypageController@change');

// 変更完了
Route::post('changecomplete', 'MypageController@complete')->name('complete');

// 投稿レシピ削除
Route::post('delete', 'MypageController@delete');

// ログインユーザーレシピ詳細＆評価
Route::get('recipe', 'RecipeController@index');

// 評価完了
Route::get('review', 'RecipeController@review');

// 検索
Route::get('search', 'SearchController@search');

// 未ログインユーザー検索結果
Route::get('guestsearch', 'SearchController@guestsearch')->name('guestsearch');

// お問い合わせ
Route::get('inquiry/inquiry', 'InquiryController@inquiry')->name('inquiry');

// お問い合わせ内容確認
Route::post('inquiry/inquiryconfirm', 'InquiryController@confirm');

// お問い合わせ完了
Route::post('inquiry/inquirycomplete', 'InquiryController@complete');
