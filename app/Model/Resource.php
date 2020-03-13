<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resource extends Model
{
    protected $table = 'resource';
    protected $primaryKey = 'r_id';
    //
    public function saves($data){
        $datas = [
            'r_name'=>$data['r_name'],
            'r_url'=>$data['r_url'],
            'pr_id'=>$data['pr_id'],
            'r_time'=>date('Y-m-d H:i:s',time())
        ];
        if($data ==''){
            return ['code'=>5,'msg'=>'所填字段不能为空','data'=>''];
        }
        $res = DB::table('resource')->insert($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'操作失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'添加成功','data'=>''];
    }

    public function updates($id,$data){
        $datas = [
            'r_name'=>$data['r_name'],
            'r_url'=>$data['r_url'],
            'pr_id'=>$data['pr_id'],
        ];
        $res = DB::table('resource')->where('r_id',$id)->update($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'更新失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'更新成功','data'=>''];
    }
    public function edit($id){
        if ($id){
            $res = DB::table('resource')->where('r_id',$id)->first();
            if($res){
                return $res;
            }
        }
        return false;
    }

    public function getList($page,$limit,$list){
//
        $start = ($page-1)*$limit;
        $where = [];
        if($list!=0){
            $where['resource.pr_id'] = $list;
        }
        $data = DB::table('resource')->join('product', 'resource.pr_id', '=', 'product.p_id')->select('resource.*', 'product.p_name')->where($where) ->orderBy('r_time','desc')->offset($start)->limit($limit)->get();
        $count = DB::table('resource')->where($where)->count('r_id');

        return ['count'=>$count,'code'=>0,'data'=>$data,'msg'=>''];
    }

    public function deletes($id){
        $res = DB::table('resource')->where('r_id',$id)->delete();
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'删除失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'删除成功'];
    }
    public function is_show($id,$value){
        $res = DB::table('resource')->where('r_id',$id)->update(['is_down'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }
}
