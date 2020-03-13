<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    protected $book ;
    public function __construct()
    {
        $this->book = new Book();

    }

    public function index(){
        $product = DB::table('product')->select(['p_id','p_name'])->get();
        return view('admin.Productbook_list',compact('product'));
    }
    //显示添加页面
    public function create(){
        return view('admin.Productbook_create');
    }
    //产品添加 存储到数据库
    public function store(Request $request){
        $file = $request->input('data',[]);
        return $this->book->saves($file);
    }

    public function edit($id){
        $res = $this->book->edit($id);
        $product = DB::table('product')->select(['p_id','p_name'])->get();
        if(!$res){
            return view('error');
        }
        return view('admin.Productbook_edit',compact('res','product'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        return $this->book->updates($id,$data['data']);
    }

    public function destroy ($id){
        return $this->book->deletes($id);
    }
    public function is_show(Request $request,$id){
        $value = $request->input('value',1);
        return $this->book->is_show($id,$value);
    }
    //说明书上传。
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
