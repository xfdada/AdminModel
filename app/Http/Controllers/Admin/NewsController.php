<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    protected $news;
    public function __construct()
    {
        $this->news = new News();
    }

    public function index(){
        return view('admin.News_list');
    }
    //显示添加页面
    public function create(){
        return view('admin.Newsadd');
    }
    //显示详情
    public function show(){
       return view('admin.Productshow');
    }
    //编辑
    public function edit($id){
        $res = $this->news->edit($id);
        if(!$res){
            return view('error');
        }
        return view('admin.Newsedit',compact('res'));
    }
    public function update(Request $request,$id){
        $data = $request->all();
        return $this->news->updates($id,$data);
    }
    //添加 存储到数据库
    public function store(Request $request){
        $data = $request->all();
        return $this->news->saves($data['data']);

    }

    public function destroy ($id){
        return $this->news->deletes($id);
    }

    public function top($id){
        return $this->news->top($id);
    }
    public function no_top($id){
        return $this->news->no_top($id);
    }
    public function is_show(Request $request,$id){
        $value = $request->input('value',1);
        return $this->news->is_show($id,$value);
    }

}
