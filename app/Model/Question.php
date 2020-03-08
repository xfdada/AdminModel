<?php

namespace App\Model;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    //
    public function saves($data){
        $datas = [
            'q_title'=>$data['q_title'],
            'p_id'=>$data['p_id'],
            'q_answer'=>$data['q_answer'],
            'q_time'=>date('Y-m-d H:i:s',time())
        ];
        if($data ==''){
            return ['code'=>5,'msg'=>'所填字段不能为空','data'=>''];
        }
        $res = DB::table('question')->insert($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'操作失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'添加成功','data'=>''];
    }

    public function updates($id,$data){
        $datas = [
            'q_title'=>$data['q_title'],
            'p_id'=>$data['p_id'],
            'q_answer'=>$data['q_answer'],
        ];
        $res = DB::table('question')->where('q_id',$id)->update($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'更新失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'更新成功','data'=>''];
    }
    public function edit($id){
        if ($id){
            $res = DB::table('question')->where('q_id',$id)->first();
            if($res){
                return $res;
            }
        }
        return false;
    }

    public function getList($page,$limit){
        $start = ($page-1)*$limit;
        $data = DB::table('question') ->join('product', 'question.p_id', '=', 'product.p_id') ->orderBy('q_time','desc')->offset($start)->limit($limit) ->select('question.*', 'product.p_name')->get();
        $count = DB::table('question')->count('q_id');
        return ['count'=>$count,'code'=>0,'data'=>$data,'msg'=>''];
    }

    public function deletes($id){
        $res = DB::table('question')->where('q_id',$id)->delete();
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'删除失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'删除成功'];
    }

    public function is_show($id,$value){
        $res = DB::table('product')->where('p_id',$id)->update(['is_show'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }

}
