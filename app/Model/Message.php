<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    protected $table = 'message';
    protected $primaryKey = 'ba_id';
    //
    public function saves($data){
        $datas = [
            'user_email'=>$data['user_email'],
            'm_content'=>$data['m_content'],
            'm_img'=>$data['m_img'],
            'm_time'=>date('Y-m-d H:i:s',time())
        ];
        if($data ==''){
            return ['code'=>5,'msg'=>'所填字段不能为空','data'=>''];
        }
        $res = DB::table('message')->insert($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'操作失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'添加成功','data'=>''];
    }

    public function updates($id,$data){
        $datas = [
            'ba_urls'=>$data['ba_url'],
            'ba_href'=>$data['ba_href'],
            'ba_desc'=>$data['ba_desc'],
        ];
        $res = DB::table('message')->where('m_id',$id)->update($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'更新失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'更新成功','data'=>''];
    }
    public function edit($id){
        if ($id){
            $res = DB::table('message')->where('ba_id',$id)->first();
            if($res){
                return $res;
            }
        }
        return false;
    }

    public function getList($page,$limit){
//
        $start = ($page-1)*$limit;
        $data = DB::table('message') ->orderBy('m_time','desc')->offset($start)->limit($limit)->get();
        $count = DB::table('message')->count('m_id');
        return ['count'=>$count,'code'=>0,'data'=>$data,'msg'=>''];
    }

    public function deletes($id){
        $res = DB::table('message')->where('m_id',$id)->delete();
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'删除失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'删除成功'];
    }
    public function is_show($id,$value){
        $res = DB::table('message')->where('m_id',$id)->update(['is_show'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }

    public function replay($id,$value){
        $res = DB::table('message')->where('m_id',$id)->update(['replay'=>$value,'r_time'=>date('Y-m-d H:i:s',time())]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }
}
