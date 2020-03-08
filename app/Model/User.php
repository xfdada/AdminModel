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

    public function getList($page,$limit,$data){
//
        $start = ($page-1)*$limit;
        if($data['params']!=''&&$data['start_time']!=''&&$data['end_time']!=''){
            $end =date("Y-m-d H:i:s",strtotime($data['end_time'])+86400) ;

            $datas = DB::table('user') ->whereRaw("concat(`user_name`,`email`,`phone`) like '%".$data['params']."%'")
                ->whereBetween('crate_time',[$data['start_time'],$end])
                ->orderBy('crate_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('user') ->whereRaw("concat(`user_name`,`email`,`phone`) like '%".$data['params']."%'")
                ->whereBetween('crate_time',[$data['start_time'],$end])->count('user_id');
        }elseif ($data['params']!=''&&$data['start_time']!=''&&$data['end_time']==''){

            $datas = DB::table('user') ->whereRaw("concat(`user_name`,`email`,`phone`) like '%".$data['params']."%'")
                ->where('crate_time','>=',$data['start_time'])
                ->orderBy('crate_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('user') ->whereRaw("concat(`user_name`,`email`,`phone`) like '%".$data['params']."%'")
                ->where('crate_time','>=',$data['start_time'])->count('user_id');
        }elseif ($data['params']!=''&&$data['start_time']==''&&$data['end_time']!=''){
            $end =date("Y-m-d H:i:s",strtotime($data['end_time'])+86400) ;
            $datas = DB::table('user') ->whereRaw("concat(`user_name`,`email`,`phone`) like '%".$data['params']."%'")
                ->where('crate_time','=<',$end)
                ->orderBy('crate_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('user') ->whereRaw("concat(`user_name`,`email`,`phone`) like '%".$data['params']."%'")
                ->where('crate_time','=<',$end)->count('user_id');
        }elseif ($data['params']!=''&&$data['start_time']==''&&$data['end_time']==''){
            $datas = DB::table('user') ->whereRaw("concat(`user_name`,`email`,`phone`) like '%".$data['params']."%'")
              ->orderBy('crate_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('user') ->whereRaw("concat(`user_name`,`email`,`phone`) like '%".$data['params']."%'")
              ->count('user_id');
        }elseif ($data['params']==''&&$data['start_time']!=''&&$data['end_time']!=''){
            $end =date("Y-m-d H:i:s",strtotime($data['end_time'])+86400) ;
            $datas = DB::table('user') ->whereBetween('crate_time',[$data['start_time'],$end])
                ->orderBy('crate_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('user') ->whereBetween('crate_time',[$data['start_time'],$end])->count('user_id');
        }elseif ($data['params']==''&&$data['start_time']!=''&&$data['end_time']==''){
            $datas = DB::table('user') ->where('crate_time','>=',$data['start_time'])
                ->orderBy('crate_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('user')->where('crate_time','>=',$data['start_time'])->count('user_id');
        }elseif ($data['params']==''&&$data['start_time']==''&&$data['end_time']!=''){
            $end =date("Y-m-d H:i:s",strtotime($data['end_time'])+86400) ;

            $datas = DB::table('user') ->where('crate_time','<=',$end)
                ->orderBy('crate_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('user')->where('crate_time','<=',$end)->count('user_id');
        }else{
            $datas = DB::table('user') ->orderBy('crate_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('user')->count('user_id');
        }

        return ['count'=>$count,'code'=>0,'data'=>$datas,'msg'=>''];
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
