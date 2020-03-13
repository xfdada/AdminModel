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
use App\Model\Pay;
use App\Model\Product;
use App\Model\Question;
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
        $n_type = $request->input('n_type','');
        $start_time = $request->input('start_time','');
        $end_time = $request->input('end_time','');
        $n_title = $request->input('n_title','');
        $data = [
            'n_type'=>$n_type,
             'start_time'=>$start_time,
             'end_time'=>$end_time,
             'n_title'=>$n_title,
        ];
        return $news->getList($page,$limit,$data);
    }

    public function book_list(Request $request){
        $book = new Book();
        $data = $request->input('product',0);
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $book->getList($page,$limit,$data);
    }

    public function res_list(Request $request){
        $res= new Resource();
        $data = $request->input('product',0);
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $res->getList($page,$limit,$data);
    }
    public function user_list(Request $request){
        $start_time = $request->input('start_time','');
        $end_time = $request->input('end_time','');
        $params = $request->input('params','');
        $data = [
            'params'=>$params,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
        ];
        $res= new User();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $res->getList($page,$limit,$data);
    }

    public function order_list(Request $request){
        $start_time = $request->input('start_time','');
        $end_time = $request->input('end_time','');
        $o_number = $request->input('o_number','');
        $data = [
            'o_number'=>$o_number,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
        ];
        $res= new Order();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $res->getList($page,$limit,$data);
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
        $start_time = $request->input('start_time','');
        $end_time = $request->input('end_time','');
        $p_name = $request->input('p_name','');
        $data = [
            'p_name'=>$p_name,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
        ];
        $product = new Product();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        $cate = new Category();
        $c = $cate->getTree();
        return $product->getList($page,$limit,$c,$data);
    }
    public function comment_list(Request $request){
        $cm= new Comment();
        $data = $request->input('product',0);
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $cm->getList($page,$limit,$data);
    }
    public function aftersell_list(Request $request){
        $af_type = $request->input('af_type','');
        $o_number = $request->input('o_number','');
        $data = [
            'af_type'=>$af_type,
            'o_number'=>$o_number,
        ];
        $cm= new AfterSell();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $cm->getList($page,$limit,$data);
    }
    public function refund_list(Request $request){
        $is_agree = $request->input('is_agree','');
        $o_number = $request->input('o_number','');
        $data = [
            'is_agree'=>$is_agree,
            'o_number'=>$o_number,
        ];
        $cm= new Refund();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $cm->getList($page,$limit,$data);
    }
    public function pay_list(Request $request){
        $pay = new Pay();
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $pay->getList($page,$limit);
    }
    public function question_list(Request $request){
        $pay = new Question();
        $data['q_title'] = $request->input('q_title','');
        $data['product'] = $request->input('product',0);
        $page = $request->input('page',1);
        $limit = $request->input('limit',10);
        return $pay->getList($page,$limit,$data);
    }
}
