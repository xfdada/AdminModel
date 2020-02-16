<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(){
        return view('admin.Product_list');
    }
    //显示添加页面
    public function create(){
        return view('admin.Productadd');
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
    public function upload_img(Request $request){
        $file = $request->file('file');
        $path = '/product'; //public下的article
        if(!is_dir('product/'.date("Ymd",time()))){
            mkdir('product/'.date("Ymd",time()),0777);
        }
        if ($file->isValid()) { //判断文件上传是否有效
            $FileType = $file->getClientOriginalExtension(); //获取文件后缀
            if(in_array( strtolower($FileType),['jpeg','jpg','gif','png'])){

                $FilePath = $file->getRealPath(); //获取文件临时存放位置
                $FileName =date("Ymd",time()).'/'.date('Y-m-d') . uniqid() . '.' . $FileType; //定义文件名
                Storage::disk('product')->put($FileName, file_get_contents($FilePath)); //存储文件
                return ['code'=>0,'url'=>"http://".$_SERVER['HTTP_HOST'].'/product/'.$FileName]; //文件路径
            }
        }
    }
}
