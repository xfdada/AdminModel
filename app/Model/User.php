<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    //
    public function saves($data){
        $datas = [
            'user_name'=>$data['user_name'],
            'user_pwd'=>$data['user_pwd'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'crate_time'=>date('Y-m-d H:i:s',time())
        ];
        if($data ==''){
            return ['code'=>5,'msg'=>'所填字段不能为空','data'=>''];
        }
        $res = DB::table('user')->insert($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'操作失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'添加成功','data'=>''];
    }

    public function updates($id,$data){
        $datas = [
            'user_name'=>$data['user_name'],
            'user_pwd'=>$data['user_pwd'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
        ];
        $res = DB::table('user')->where('user_id',$id)->update($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'更新失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'更新成功','data'=>''];
    }
    public function edit($id){
        if ($id){
            $res = DB::table('user')->where('user_id',$id)->first();
            if($res){
                return $res;
            }
        }
        return false;
    }

    public function getList($page,$limit){
//
        $start = ($page-1)*$limit;
        $data = DB::table('user') ->orderBy('crate_time','desc')->offset($start)->limit($limit)->get();
        $count = DB::table('user')->count('user_id');
        return ['count'=>$count,'code'=>0,'data'=>$data,'msg'=>''];
    }

    public function deletes($id){
        $res = DB::table('user')->where('user_id',$id)->delete();
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'删除失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'删除成功'];
    }
    public function is_show($id,$value){
        $res = DB::table('user')->where('user_id',$id)->update(['status'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }
}
