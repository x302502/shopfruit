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
  return view('welcome');
});
/**
*
*/
Route::get('/','MyController@getIndex');
/**
*
*/
Route::get('login','MyController@getLogin');
Route::post('login','MyController@postLogin');
/**
*
*/
Route::get('/regis','MyController@getRegis');
Route::post('/regis','MyController@postRegis');

/**
*
*/
Route::get('/logout','MyController@getLogout');
Route::get('/introduction','MyController@getIntruction');
Route::get('/location','MyController@getLocation');

/**
*
*/
Route::get('userinfor/{id}','MyController@getUserinfor');
Route::post('userinfor/{id}','MyController@posttEditUserinfor');
/**
*
*/
Route::get('listdetailcategory/{id}','MyController@getListDetailCategory');
Route::get('detailproduct/{id}','MyController@getDetailProduct');
/**
*
*/

Route::get('/category','MyController@getCategory');
Route::post('/comment/{id}','MyController@postComment');
/**
*
*/
Route::get('/search','MyController@getSearch');
/**
*
*/
Route::get('addCart/{id}/{countProduct}','CartController@addCart');
Route::get('subCart/{id}/{countProduct}','CartController@subCart');
Route::get('removeAllProduct/{id}','CartController@removeAllProduct');
Route::get('successPayment','CartController@successPayment');
Route::get('/cartshop','CartController@getCartShop');
Route::get('/payproduct','CartController@getPayProduct');

//--------------Admin-----------------------

// Route::get('dangki','AdminController@getdangki');
// Route::post('dangki','AdminController@postdangki');

Route::get('admin','AdminController@getLoginAdmin');
Route::post('admin','AdminController@postLoginAdmin');
Route::get('admin/logoutAdmin','AdminController@getLogOut');

Route::group(['prefix'=>'admin'],function(){

  Route::group(['prefix'=>'category'],function(){

    Route::get('danhsach','CategoryController@getDanhsach');

    Route::get('sua/{id}','CategoryController@getSua');

    Route::post('sua/{id}','CategoryController@postSua');

    Route::get('them','CategoryController@getThem');

    Route::post('them','CategoryController@postThem');

    Route::get('xoa/{id}','CategoryController@getXoa');

  });

  Route::group(['prefix'=>'detailcategory'],function(){

    Route::get('danhsach','DetailCategoryController@getDanhsach');

    Route::get('sua/{id}','DetailCategoryController@getSua');

    Route::post('sua/{id}','DetailCategoryController@postSua');

    Route::get('them','DetailCategoryController@getThem');

    Route::post('them','DetailCategoryController@postThem');

    Route::get('xoa/{id}','DetailCategoryController@getXoa');

  });

  Route::group(['prefix'=>'product'],function(){

    Route::get('danhsach','ProductController@getDanhsach');

    Route::get('sua/{id}','ProductController@getSua');

    Route::post('sua/{id}','ProductController@postSua');

    Route::get('them','ProductController@getThem');

    Route::post('them','ProductController@postThem');

    Route::get('xoa/{id}','ProductController@getXoa');


  });

  Route::group(['prefix'=>'orderdetail'],function(){

    Route::get('danhsach','OrderDetailController@getDanhsach');


  });

  Route::group(['prefix'=>'order'],function(){

    Route::get('danhsach','OrderController@getDanhsach');
    Route::get('sua/{id}','OrderController@getSua');

    Route::post('sua/{id}','OrderController@postSua');

  });

  Route::group(['prefix'=>'comment'],function(){
    Route::get('danhsach','CommentController@getDanhsach');
    Route::get('xoa/{id}','CommentController@getXoa');
  });

  Route::group(['prefix'=>'user'],function(){

    Route::get('danhsach','UsersController@getDanhsach');
    Route::get('xoa/{id}','UsersController@getXoaUser');
  });


});
