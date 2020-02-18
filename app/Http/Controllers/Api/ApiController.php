<?php
/**
 * 前后端通用接口接口
 */
namespace App\Http\Controllers\Api;
use App\Model\AfterSell;
use App\Model\Banner;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Message;
use App\Model\Order;
use App\Model\Product;
use App\Model\Refund;
use App\Model\Resource;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\News;
use App\Model\Book;

class ApiController extends Controller
{
    //图片上传。
    public function upload_img(Request $request){
        $file = $request->file('file');
        $path = '/img'; //public下的article
        if(!is_dir('img/'.date("Ymd",time()))){
            mkdir('img/'.date("Ymd",time()),0777);
        }
        if ($file->isValid()) { //判断文件上传是否有效
            $FileType = $file->getClientOriginalExtension(); //获取文件后缀
            if(in_array( strtolower($FileType),['jpeg','jpg','gif','png'])){
                $FilePath = $file->getRealPath(); //获取文件临时存放位置
                $FileName =date("Ymd",time()).'/'.date('Y-m-d') . uniqid() . '.' . $FileType; //定义文件名
                Storage::disk('img')->put($FileName, file_get_contents($FilePath)); //存储文件
                return ['code'=>0,'url'=>"http://".$_SERVER['HTTP_HOST'].'/img/'.$FileName]; //文件路径
            }
        }
    }
    //新闻分页
    public function news_list(Request $request){
        $news = new News();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $news->getList($page,$limit);
    }

    public function book_list(Request $request){
        $book = new Book();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $book->getList($page,$limit);
    }

    public function res_list(Request $request){
        $res= new Resource();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $res->getList($page,$limit);
    }
    public function user_list(Request $request){
        $res= new User();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $res->getList($page,$limit);
    }

    public function order_list(Request $request){
        $res= new Order();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $res->getList($page,$limit);
    }
    public function banner_list(Request $request){
        $res= new Banner();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $res->getList($page,$limit);
    }
    public function message_list(Request $request){
        $res= new Message();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $res->getList($page,$limit);
    }
    public function category_list(Request $request){
        $cate = new Category();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $cate->getList($page,$limit);
    }
    public function product_list(Request $request){
        $product = new Product();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        $cate = new Category();
        $c = $cate->getTree();
        return $product->getList($page,$limit,$c);
    }
    public function comment_list(Request $request){
        $cm= new Comment();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $cm->getList($page,$limit);
    }
    public function aftersell_list(Request $request){
        $cm= new AfterSell();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $cm->getList($page,$limit);
    }
    public function refund_list(Request $request){
        $cm= new Refund();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $cm->getList($page,$limit);
    }
}
