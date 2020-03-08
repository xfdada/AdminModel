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
    return view('admin.index');
});
Route::get('login','Admin\LoginController@index');
Route::get('login/captcha/{code?}','Admin\LoginController@captcha');
Route::resource('news','Admin\NewsController');
Route::get('news/top/{id}','Admin\NewsController@top');
Route::get('news/no_top/{id?}','Admin\NewsController@no_top');
Route::post('news/is_show/{id?}','Admin\NewsController@is_show');
Route::resource('category','Admin\CategoryController');
Route::resource('productadd','Admin\ProductController');
Route::post('productadd/is_show/{id?}','Admin\ProductController@is_show');
Route::post('productadd/is_hot/{id?}','Admin\ProductController@is_hot');
Route::post('productadd/is_new/{id?}','Admin\ProductController@is_new');
Route::resource('books','Admin\BookController');
Route::post('books/is_show/{id?}','Admin\BookController@is_show');
Route::resource('resources','Admin\ResourceController');
Route::post('res/is_show/{id?}','Admin\ResourceController@is_show');
Route::resource('banner','Admin\BannerController');
Route::post('banner/sort/{id?}','Admin\BannerController@sort');
Route::resource('message','Admin\MessageController');
Route::post('message/is_show/{id?}','Admin\MessageController@is_show');
Route::post('message/replay/{id?}','Admin\MessageController@replay');
Route::resource('comment','Admin\CommentController');
Route::post('comment/is_show/{id?}','Admin\CommentController@is_show');
Route::post('comment/replay/{id?}','Admin\CommentController@replay');
Route::resource('user','Admin\UserController');
Route::post('user/is_show/{id?}','Admin\UserController@is_show');
Route::resource('order','Admin\OrderController');
Route::resource('pay','Admin\PayController');
Route::resource('question','Admin\QuestionController');
Route::resource('refund','Admin\RefundController');
Route::post('refund/is_agree/{id?}','Admin\RefundController@is_agree');
Route::resource('after_sell','Admin\AfterSellController');
Route::post('after_sell/is_agree/{id?}','Admin\AfterSellController@is_agree');
Route::post('/product/upload','Admin\ProductController@upload_img');
Route::post('/book/upload','Admin\BookController@upload_book');
Route::post('/resource/upload','Admin\ResourceController@upload_resource');
Route::post('/api/upload','Api\ApiController@upload_img');
Route::any('/api/news_list','Api\ApiController@news_list');
Route::any('/api/book_list','Api\ApiController@book_list');
Route::any('/api/res_list','Api\ApiController@res_list');
Route::any('/api/user_list','Api\ApiController@user_list');
Route::any('/api/order_list','Api\ApiController@order_list');
Route::any('/api/banner_list','Api\ApiController@banner_list');
Route::any('/api/message_list','Api\ApiController@message_list');
Route::get('/api/category_list','Api\ApiController@category_list');
Route::get('/api/product_list','Api\ApiController@product_list');
Route::get('/api/comment_list','Api\ApiController@comment_list');
Route::get('/api/aftersell_list','Api\ApiController@aftersell_list');
Route::get('/api/refund_list','Api\ApiController@refund_list');
Route::get('/api/pay_list','Api\ApiController@pay_list');
Route::get('/api/question_list','Api\ApiController@question_list');
