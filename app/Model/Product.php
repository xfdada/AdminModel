<?php

namespace App\Model;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    //
    public function saves($data){
        $datas = [
            'p_name'=>$data['p_name'],
            'p_icon'=>$data['icon'],
            'p_img'=>$data['img_pro'],
            'p_desc'=>$data['p_desc'],
            'is_hot'=>$data['is_hot'],
            'price'=>$data['price'],
            'now_price'=>$data['now_price'],
            'is_new'=>$data['is_new'],
            'is_show'=>$data['is_show'],
            'c_id'=>$data['p_type'],
            'p_detail'=>$data['content'],
            'p_params'=>$data['content2'],
            'p_pack'=>$data['content3'],
            'p_time'=>date('Y-m-d H:i:s',time())
        ];
        if($data ==''){
            return ['code'=>5,'msg'=>'所填字段不能为空','data'=>''];
        }
        $res = DB::table('product')->insert($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'操作失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'添加成功','data'=>''];
    }

    public function updates($id,$data){
        $datas = [
            'p_name'=>$data['p_name'],
            'p_icon'=>$data['icon'],
            'p_img'=>$data['img_pro'],
            'p_desc'=>$data['p_desc'],
            'price'=>$data['price'],
            'now_price'=>$data['now_price'],
            'is_hot'=>$data['is_hot'],
            'is_new'=>$data['is_new'],
            'is_show'=>$data['is_show'],
            'c_id'=>$data['p_type'],
            'p_detail'=>$data['content'],
            'p_params'=>$data['content2'],
            'p_pack'=>$data['content3'],
        ];
        $res = DB::table('product')->where('p_id',$id)->update($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'更新失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'更新成功','data'=>''];
    }
    public function edit($id){
        if ($id){
            $res = DB::table('product')->where('p_id',$id)->first();
            if($res){
                return $res;
            }
        }
        return false;
    }

    public function getList($page,$limit,$array,$list){
//
        $start = ($page-1)*$limit;
        $where = [];
        if($list['p_name']!=''){
            $where[]= ['p_name','like', '%'.$list['p_name'].'%'];
        }
        if($list['start_time']==''&&$list['end_time']!=''){
            $end =date("Y-m-d H:i:s",strtotime($list['end_time'])+86400) ;
            $where[]= ['n_time','<',$end];
            $data = DB::table('product')->where($where) ->orderBy('p_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('product')->where($where)->count('p_id');
        }
        elseif ($list['start_time']!=''&&$list['end_time']==''){
            $where[]= ['n_time','>=',$list['start_time']];
            $data = DB::table('product')->where($where) ->orderBy('p_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('product')->where($where)->count('p_id');
        }
        elseif($list['start_time']!=''&&$list['end_time']!=''){
            $time = $list['start_time'];
            $end =date("Y-m-d H:i:s",strtotime($list['end_time'])+86400) ;
            $data = DB::table('product') ->where($where)->whereBetween('n_time',[$list['start_time'],$end])->orderBy('p_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('product')->where($where)->whereBetween('n_time',[$time,$end])->count('p_id');
        }elseif($list['start_time']==''&&$list['end_time']==''){
            $data = DB::table('product') ->where($where)->orderBy('p_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('product')->where($where)->count('p_id');
        }
        else {
            $data = DB::table('product') ->orderBy('p_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('product')->count('p_id');
        }
        foreach ($data as $v){
            foreach ($array as $vv){
                if ($v->c_id==$vv->c_id){
                    $v->c_name = $vv->c_name;
                }else{
                    continue;
                }
            }
        }
//        dd($array);
        return ['count'=>$count,'code'=>0,'data'=>$data,'msg'=>''];
    }

    public function deletes($id){
        $res = DB::table('product')->where('p_id',$id)->delete();
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'删除失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'删除成功'];
    }
    public function sort($id,$value){
        $res = DB::table('product')->where('p_id',$id)->update(['ba_index'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }

    public function is_show($id,$value){
        $res = DB::table('product')->where('p_id',$id)->update(['is_show'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }
    public function is_stop($id,$value){
        $res = DB::table('product')->where('p_id',$id)->update(['is_stop'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }
    public function is_hot($id,$value){
        $res = DB::table('product')->where('p_id',$id)->update(['is_hot'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }
    public function is_new($id,$value){
        $res = DB::table('resource')->where('p_id',$id)->update(['is_new'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }


}
