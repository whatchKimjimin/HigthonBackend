<?php

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
    return redirect()->route('goods.index');
});

Auth::routes();

Route::get('/home', function(){
    return redirect()->route('goods.index');
});

// FACEBOOK LOGIN
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/goods/category/{category}','GoodsController@goodsCategory');
// GOODS SEARCH
Route::get('/goods/search','GoodsController@searchGoods');
// GOODS RESOURCE
Route::resource('/goods','GoodsController');


// IMAGES HELPER
Route::get('/image/{id}','HelperController@getImages');

// COMMENT RESOURCE
Route::resource('/comment','CommentController');

// USER RESOURCE
Route::resource('/user','UsersController');