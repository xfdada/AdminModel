<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyApiController extends Controller{

    //真伪查询
    public function getCode(Request $request){
        $code = $request->input('code','');
        $res = DB::table('code')->where('cd_code',$code)->select(['cd_code','cd_time'])->first();
        if(!$res){
            return ['code'=>5,'msg'=>'没有查询到该数据','data'=>''];
        }
        return ['code'=>0,'msg'=>'添加成功','data'=>$res];
    }

    //

}