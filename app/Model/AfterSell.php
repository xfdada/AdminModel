<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AfterSell extends Model
{
    protected $table = 'aftersell';
    protected $primaryKey = 'af_id';
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
        $res = DB::table('aftersell')->insert($datas);
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
        $res = DB::table('aftersell')->where('af_id',$id)->update($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'更新失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'更新成功','data'=>''];
    }
    public function edit($id){
        if ($id){
            $res = DB::table('aftersell')->where('af_id',$id)->first();
            if($res){
                return $res;
            }
        }
        return false;
    }

    public function getList($page,$limit,$data){
//
        $where = [];
        $start = ($page-1)*$limit;
        if($data['o_number']!=''){
            $where[] = ['o_number','like','%'.$data['o_number'].'%'];
        }
        if($data['af_type']!=''){
            $where['af_type']= intval($data['af_type']);
        }
        $datas = DB::table('aftersell')->where($where) ->orderBy('af_time','desc')->offset($start)->limit($limit)->get();
        $count = DB::table('aftersell')->where($where)->count('af_id');
        $user = DB::table('user')->get(['user_id','user_name']);
        $product = DB::table('product')->get(['p_id','p_name']);
        foreach ($user as $u){
            foreach ($datas as $d){
                if ($u->user_id==$d->user_id){
                    $d->user_name = $u->user_name;
                }
            }
        }
        foreach ($product as $u){
            foreach ($datas as $d){
                if ($u->p_id==$d->p_id){
                    $d->p_name = $u->p_name;
                }
            }
        }
        return ['count'=>$count,'code'=>0,'data'=>$datas,'msg'=>''];
    }

    public function deletes($id){
        $res = DB::table('aftersell')->where('af_id',$id)->delete();
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'删除失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'删除成功'];
    }
    public function is_show($id,$value){
        $res = DB::table('aftersell')->where('af_id',$id)->update(['is_agree'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }

    public function replay($id,$value){
        $res = DB::table('aftersell')->where('af_id',$id)->update(['cm_replay'=>$value,'re_time'=>date('Y-m-d H:i:s',time())]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }
}
