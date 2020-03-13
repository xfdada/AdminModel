<?php

namespace App\Http\Controllers\Admin;

use App\Model\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    protected $Res ;
    public function __construct()
    {
        $this->Res = new Resource();

    }
    public function index(){
        $product = DB::table('product')->select(['p_id','p_name'])->get();
        return view('admin.Productresource_list',compact('product'));
    }
    //显示添加页面
    public function create(){
        return view('admin.Productresource_create');
    }
    //固件添加 存储到数据库
    public function store(Request $request){
        $file = $request->input('data',[]);
        return $this->Res->saves($file);
    }
    public function edit($id){
        $product = DB::table('product')->select(['p_id','p_name'])->get();
        $res = $this->Res->edit($id);
        if(!$res){
            return view('error');
        }
        return view('admin.Productresource_edit',compact('res','product'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        return $this->Res->updates($id,$data['data']);
    }
    public function destroy ($id){
        return $this->Res->deletes($id);
    }
    public function is_show(Request $request,$id){
        $value = $request->input('value',1);
        return $this->Res->is_show($id,$value);
    }
    //固件上传。
    public function upload_resource(Request $request){
        $file = $request->file('file');
        if(!is_dir('resource/'.date("Ymd",time()))){
            mkdir('resource/'.date("Ymd",time()));
        }
        if ($file->isValid()) { //判断文件上传是否有效
            $FileType = $file->getClientOriginalExtension(); //获取文件后缀
            if(in_array( strtolower($FileType),['zip','rar','7z'])){
                $FilePath = $file->getRealPath(); //获取文件临时存放位置
                $FileName =date("Ymd",time()).'/'.date('Y-m-d') . uniqid() . '.' . $FileType; //定义文件名
                Storage::disk('resource')->put($FileName, file_get_contents($FilePath)); //存储文件
                return ['code'=>0,'url'=>"http://".$_SERVER['HTTP_HOST'].'/resource/'.$FileName]; //文件路径
            }
        }
    }
}
