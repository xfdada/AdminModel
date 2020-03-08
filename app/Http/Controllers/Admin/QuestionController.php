<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{

    public function index(){
        return view('admin.Question_list');
    }
    //显示添加页面
    public function create(){
       $data = DB::table('product')->get(['p_id','p_name']);
        return view('admin.Question_create',compact('data'));
    }
    //显示详情
    public function show($id){
        $data = DB::table('question')->where('q_id',$id)->get('q_answer');
       return view('admin.Question_show',compact('data'));
    }
    public function edit($id){
        $data = DB::table('product')->get(['p_id','p_name']);
        $product = new Question();
        $res = $product->edit($id);
        if(!$res){
            return view('error');
        }
        return view('admin.Question_edit',compact('res','data'));
    }


    public function update(Request $request,$id){
        $product = new Question();
        $data = $request->all();
        return $product->updates($id,$data['data']);
    }

    //产品添加 存储到数据库
    public function store(Request $request){
        $product = new Question();
        $file = $request->input('data');
        return $product->saves($file);
        dd($file);
    }
    public function destroy ($id){
        $product = new Question();
        return $product->deletes($id);
    }

}
