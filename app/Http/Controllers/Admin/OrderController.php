<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    public function index(){
        return view('admin.Order_list');
    }
    //显示添加页面
    public function create(){
        return view('admin.Productbook_create');
    }
    //显示详情
    public function show(){
       return view('admin.Productshow');
    }
    //产品添加 存储到数据库
    public function store(Request $request){
        $product = new Product();
        $file = $request->all();
        dd($file);
    }
    //图片上传。
    public function upload_book(Request $request){
        $file = $request->file('file');
        if(!is_dir('book/'.date("Ymd",time()))){
            mkdir('book/'.date("Ymd",time()));
        }
        if ($file->isValid()) { //判断文件上传是否有效
            $FileType = $file->getClientOriginalExtension(); //获取文件后缀
            if(in_array( strtolower($FileType),['doc','pdf','txt'])){
                $FilePath = $file->getRealPath(); //获取文件临时存放位置
                $FileName =date("Ymd",time()).'/'.date('Y-m-d') . uniqid() . '.' . $FileType; //定义文件名
                Storage::disk('book')->put($FileName, file_get_contents($FilePath)); //存储文件
                return ['code'=>0,'url'=>"http://".$_SERVER['HTTP_HOST'].'/book/'.$FileName]; //文件路径
            }
        }
    }
}
