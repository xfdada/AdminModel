<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'ba_id';
    //
    public function saves($data){
        $datas = [
            'ba_urls'=>$data['ba_url'],
            'ba_href'=>$data['ba_href'],
            'ba_desc'=>$data['ba_desc'],
            'ba_time'=>date('Y-m-d H:i:s',time())
        ];
        if($data ==''){
            return ['code'=>5,'msg'=>'所填字段不能为空','data'=>''];
        }
        $res = DB::table('banner')->insert($datas);
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
        $res = DB::table('banner')->where('ba_id',$id)->update($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'更新失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'更新成功','data'=>''];
    }
    public function edit($id){
        if ($id){
            $res = DB::table('banner')->where('ba_id',$id)->first();
            if($res){
                return $res;
            }
        }
        return false;
    }

    public function getList($page,$limit){
//
        $start = ($page-1)*$limit;
        $data = DB::table('banner') ->orderBy('ba_index')->offset($start)->limit($limit)->get();
        $count = DB::table('banner')->count('ba_id');
        return ['count'=>$count,'code'=>0,'data'=>$data,'msg'=>''];
    }

    public function deletes($id){
        $res = DB::table('banner')->where('ba_id',$id)->delete();
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'删除失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'删除成功'];
    }
    public function sort($id,$value){
        $res = DB::table('banner')->where('ba_id',$id)->update(['ba_index'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }
}
