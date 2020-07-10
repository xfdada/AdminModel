<?php
namespace App\Http\Controllers\Home;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller{

    //产品列表页 ，还有搜索条件没有加上
    public function index(Request $request,$c_id=0){
        if($request)
        $where['c_id'] = $c_id;
        if($c_id==0){
            $where=[];
        }
        $catge = new Category();
        $titles = $catge->getMenu(1);
        $res_title = $catge->getMenu(2);
        $res_list = $catge->getMenu(3);
        $is_mobile = null;
        //判断是否为手机端
        if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
            $is_mobile = false;
        } elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
            $is_mobile = true;
        } else {
            $is_mobile = false;
        }
        if($is_mobile){
            $product_list = DB::table('product')->where($where)->simplePaginate(15);
        }else{
            $product_list = DB::table('product')->where($where)->paginate(15);
        }
        return view('home.product_list',['res'=>$res_title,'res_list'=>$res_list,'product_list'=>$product_list,'titles'=>$titles]);
    }

    public function product_detail(Request $request,$id){
//        $cookie = $request->cookie('aid');
//        dd($cookie);
        $product = new Product();
        $res = $product->show($id);
        if(!$res){
            return 'error';
        }
        $img = explode(',',$res->p_img);
        return view('home.products',['res'=>$res,'img'=>$img]);
    }
}