<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
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
        $cate = new Category();
        $list = $cate->getTree();
        $data = [];
        foreach ($list as $v){
            $v->c_name = str_repeat('- ', $v->level).$v->c_name;
            $data[] = $v;
        }
        return view('admin.Productadd',compact('data'));
    }
    //显示详情
    public function show(){
       return view('admin.Productshow');
    }
    public function edit($id){
        $product = new Product();
        $cate = new Category();
        $list = $cate->getTree();
        $data = [];
        foreach ($list as $v){
            $v->c_name = str_repeat('- ', $v->level).$v->c_name;
            $data[] = $v;
        }
        $res = $product->edit($id);
        if(!$res){
            return view('error');
        }
        return view('admin.Productedit',compact('res','data'));
    }


    public function update(Request $request,$id){
        $product = new Product();
        $data = $request->all();
        return $product->updates($id,$data['data']);
    }

    //产品添加 存储到数据库
    public function store(Request $request){
        $product = new Product();
        $file = $request->input('data');
        return $product->saves($file);
        dd($file);
    }
    public function destroy ($id){
        $product = new Product();
        return $product->deletes($id);
    }
    public function is_show(Request $request,$id){
        $value = $request->input('value',1);
        $product = new Product();
        return $product->is_show($id,$value);
    }
    public function is_hot(Request $request,$id){
        $value = $request->input('value',1);
        $product = new Product();
        return $product->is_hot($id,$value);
    }
    public function is_stop(Request $request,$id){
        $value = $request->input('value',1);
        $product = new Product();
        return $product->is_stop($id,$value);
    }
    public function is_new(Request $request,$id){
        $value = $request->input('value',1);
        $product = new Product();
        return $product->is_new($id,$value);
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
