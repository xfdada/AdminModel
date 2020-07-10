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
use App\Model\Category;
use Illuminate\Support\Facades\DB;

Route::get('my_admin', function () {
    return view('admin.index');
});
Route::get('my_admin/login','Admin\LoginController@index');
Route::get('my_admin/login/captcha/{code?}','Admin\LoginController@captcha');
Route::resource('my_admin/news','Admin\NewsController');
Route::get('my_admin/news/top/{id}','Admin\NewsController@top');
Route::get('my_admin/news/no_top/{id?}','Admin\NewsController@no_top');
Route::post('my_admin/news/is_show/{id?}','Admin\NewsController@is_show');
Route::resource('my_admin/category','Admin\CategoryController');
Route::resource('my_admin/productadd','Admin\ProductController');
Route::post('my_admin/productadd/is_show/{id?}','Admin\ProductController@is_show');
Route::post('my_admin/productadd/is_hot/{id?}','Admin\ProductController@is_hot');
Route::post('my_admin/productadd/is_new/{id?}','Admin\ProductController@is_new');
Route::post('my_admin/productadd/is_stop/{id?}','Admin\ProductController@is_stop');
Route::resource('my_admin/books','Admin\BookController');
Route::post('my_admin/books/is_show/{id?}','Admin\BookController@is_show');
Route::resource('my_admin/resources','Admin\ResourceController');
Route::post('my_admin/res/is_show/{id?}','Admin\ResourceController@is_show');
Route::resource('my_admin/banner','Admin\BannerController');
Route::post('my_admin/banner/sort/{id?}','Admin\BannerController@sort');
Route::resource('my_admin/top_banner','Admin\TopBannerController');
Route::resource('my_admin/message','Admin\MessageController');
Route::post('my_admin/message/is_show/{id?}','Admin\MessageController@is_show');
Route::post('my_admin/message/replay/{id?}','Admin\MessageController@replay');
Route::resource('my_admin/comment','Admin\CommentController');
Route::post('my_admin/comment/is_show/{id?}','Admin\CommentController@is_show');
Route::post('my_admin/comment/replay/{id?}','Admin\CommentController@replay');
Route::resource('my_admin/user','Admin\UserController');
Route::post('my_admin/user/is_show/{id?}','Admin\UserController@is_show');
Route::resource('my_admin/order','Admin\OrderController');
Route::resource('my_admin/pay','Admin\PayController');
Route::resource('my_admin/question','Admin\QuestionController');
Route::resource('my_admin/refund','Admin\RefundController');
Route::post('my_admin/refund/is_agree/{id?}','Admin\RefundController@is_agree');
Route::resource('my_admin/after_sell','Admin\AfterSellController');
Route::post('my_admin/after_sell/is_agree/{id?}','Admin\AfterSellController@is_agree');
Route::any('my_admin/product/upload','Admin\ProductController@upload_img');
Route::post('my_admin/book/upload','Admin\BookController@upload_book');
Route::post('my_admin/resource/upload','Admin\ResourceController@upload_resource');
Route::post('my_admin/api/upload','Api\ApiController@upload_img');
Route::any('my_admin/api/news_list','Api\ApiController@news_list');
Route::any('my_admin/api/book_list','Api\ApiController@book_list');
Route::any('my_admin/api/res_list','Api\ApiController@res_list');
Route::any('my_admin/api/user_list','Api\ApiController@user_list');
Route::any('my_admin/api/order_list','Api\ApiController@order_list');
Route::any('my_admin/api/banner_list','Api\ApiController@banner_list');
Route::any('my_admin/api/top_banner_list','Api\ApiController@top_banner_list');
Route::any('my_admin/api/message_list','Api\ApiController@message_list');
Route::get('my_admin/api/category_list','Api\ApiController@category_list');
Route::get('my_admin/api/product_list','Api\ApiController@product_list');
Route::get('my_admin/api/comment_list','Api\ApiController@comment_list');
Route::get('my_admin/api/aftersell_list','Api\ApiController@aftersell_list');
Route::get('my_admin/api/refund_list','Api\ApiController@refund_list');
Route::get('my_admin/api/pay_list','Api\ApiController@pay_list');
Route::get('my_admin/api/question_list','Api\ApiController@question_list');

Route::get('', function () {
    $banner = \Illuminate\Support\Facades\DB::table('banner')->orderBy('ba_index')->get();
    return view('home.index',['banner'=>$banner]);
});
Route::get('/news', function () {
//    $is_mobile = null;
//    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
//        $is_mobile = false;
//    } elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
//        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
//        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
//        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
//        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
//        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
//        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
//        $is_mobile = true;
//    } else {
//        $is_mobile = false;
//    }
//    if($is_mobile){
//        $news = \Illuminate\Support\Facades\DB::table('news')->simplePaginate(1);
//    }else{
        $news = \Illuminate\Support\Facades\DB::table('news')->paginate(1);
//    }
    return view('home.news',['news'=>$news]);
});

Route::get('/news_detail', function () {
    $banner = \Illuminate\Support\Facades\DB::table('news')->where('n_id',3)->first();
    return view('home.news_detail',['banner'=>$banner]);
});
Route::get('/project', function () {
    return view('home.project');
});
Route::get('/case', function () {
    return view('home.case');
});
Route::get('/solution', function () {
    return view('home.solution');
});
Route::get('/about', function () {
    return view('home.about');
});
Route::get('/technical-support', function () {
    return view('home.technical-support');
});

Route::get('/case_detail', function () {
    return view('home.case_detail');
});

Route::get('/products/{c_id?}','Home\ProductController@index');

Route::get('/products/product_detail/{p_id?}','Home\ProductController@product_detail');

Route::post('/test',function(){
    sleep(180);
//    exit;
});

