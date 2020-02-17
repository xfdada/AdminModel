<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index(){
        return view('admin.Category_list');
    }
    //显示添加页面
    public function create(){
        $cate = new Category();
        $list = $cate->getTree();
        $data = [];
        foreach ($list as $v){
            $v->c_name = str_repeat('-', $v->level).$v->c_name;
            $data[] = $v;
        }
        return view('admin.Category_create',compact('data'));
    }
    //显示详情
    public function show(){
       return view('admin.Productshow');
    }
    //产品添加 存储到数据库
    public function store(Request $request){
        $cate = new Category();
        $file = $request->all();
        return $cate->saves($file['data']);
    }
    public function edit($id){
        $cate = new Category();
        $res = $cate->edit($id);
        if(!$res){
            return view('error');
        }
        $list = $cate->getTree();
        $data = [];
        foreach ($list as $v){
            $v->c_name = str_repeat('- ', $v->level).$v->c_name;
            $data[] = $v;
        }
        return view('admin.Category_edit',compact('res','data'));
    }
    public function update(Request $request,$id){
        $data = $request->all();
        $cate = new Category();
        return $cate->updates($id,$data['data']);
    }
    public function destroy ($id){
        $cate = new Category();
        return $cate->deletes($id);
    }
}
