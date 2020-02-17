<?php

namespace App\Model;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public function saves($data){
        if($data ==''){
            return ['code'=>5,'msg'=>'所填字段不能为空','data'=>''];
        }
        $datas = [
            'c_name'=>$data['c_name'],
            'c_pid'=>$data['c_pid'],
            'c_time'=>date('Y-m-d H:i:s',time())
        ];

        $res = DB::table('category')->insert($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'操作失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'添加成功','data'=>''];
    }

    public function updates($id,$data){
        $datas = [
            'c_name'=>$data['c_name'],
            'c_pid'=>$data['c_pid'],
        ];
        $res = DB::table('category')->where('c_id',$id)->update($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'更新失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'更新成功','data'=>''];
    }
    public function edit($id){
        if ($id){
            $res = DB::table('category')->where('c_id',$id)->first();
            if($res){
                return $res;
            }
        }
        return false;
    }

    public function getList($page,$limit){
        $start = ($page-1)*$limit;
        $data = DB::table('category')->orderBy('c_time','desc') ->offset($start)->limit($limit)->get();
        $count = DB::table('category')->count('c_id');
        return ['count'=>$count,'code'=>0,'data'=>$data,'msg'=>''];
    }

    public function getTree(){
        $data = DB::table('category')->get(['c_id','c_name','c_pid']);
        return $this->getSecond($data);
    }

    public function deletes($id){
        $res = DB::table('category')->where('c_id',$id)->delete();
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'删除失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'删除成功'];
    }

//    无限级分类
    private function getSecond($array,$pid=0,$level=1){
        static $list = [];
        foreach ($array as $key => $value){
            //第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
//            dd($value);
            if ($value->c_pid == $pid){
                //把数组放到list中
                $value->level=$level;
                $list[] = $value;
                //把这个节点从数组中移除,减少后续递归消耗
                unset($array[$key]);
                //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
                $this->getSecond($array, $value->c_id,$level+1);
            }
        }
        return $list;
    }
}
