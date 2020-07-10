<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'n_id';
    //
    public function saves($data){
        $datas = [
            'n_title'=>$data['n_title'],
            'n_icon'=>$data['n_icon'],
            'n_type'=>$data['n_type'],
            'n_desc'=>$data['n_desc'],
            'n_content'=>$data['n_content'],
            'n_time'=>date('Y-m-d H:i:s',time())
        ];
        if($data ==''){
            return ['code'=>5,'msg'=>'所填字段不能为空','data'=>''];
        }
        $res = DB::table('news')->insert($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'操作失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'添加成功','data'=>''];
    }

    public function updates($id,$data){
        $datas = [
            'n_title'=>$data['data']['n_title'],
            'n_icon'=>$data['data']['n_icon'],
            'n_type'=>$data['data']['n_type'],
            'n_desc'=>$data['data']['n_desc'],
            'n_content'=>$data['data']['n_content']
        ];
        $res = DB::table('news')->where('n_id',$id)->update($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'更新失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'更新成功','data'=>''];
    }
    public function edit($id){
        if ($id){
            $res = DB::table('news')->where('n_id',$id)->first();
            if($res){
                return $res;
            }
        }
        return false;
    }

    public function getList($page,$limit,$data){
//
        $start = ($page-1)*$limit;
        $where =[];
        if($data['n_type']!=''){
            $where['n_type']= intval($data['n_type']);
        }
        if($data['n_title']!=''){
            $where[]= ['n_title','like', '%'.$data['n_title'].'%'];
        }

        if($data['start_time']==''&&$data['end_time']!=''){
           $end =date("Y-m-d H:i:s",strtotime($data['end_time'])+86400) ;
            $where[]= ['n_time','<',$end];
        }
        if($data['start_time']!=''&&$data['end_time']==''){
            $where[]= ['n_time','>=',$data['start_time']];

        }
        if($data['start_time']!=''&&$data['end_time']!=''){
           $time = $data['start_time'];
            $end =date("Y-m-d H:i:s",strtotime($data['end_time'])+86400) ;
            $data = DB::table('news') ->where($where)->whereBetween('n_time',[$data['start_time'],$end])->orderBy('n_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('news')->where($where)->whereBetween('n_time',[$time,$end])->count('n_id');

        }else{
            $data = DB::table('news') ->where($where)->orderBy('n_time','desc')->offset($start)->limit($limit)->get();
            $count = DB::table('news')->where($where)->count('n_id');
        }

        return ['count'=>$count,'code'=>0,'data'=>$data,'msg'=>''];
    }

    public function deletes($id){
        $res = DB::table('news')->where('n_id',$id)->delete();
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'删除失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'删除成功'];
    }
    public function top($id){
        $res = DB::table('news')->where('n_id',$id)->update(['top'=>1]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'置顶失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'置顶成功'];
    }
    public function no_top($id){
        $res = DB::table('news')->where('n_id',$id)->update(['top'=>2]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'取消置顶失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'取消成功'];
    }
    public function is_show($id,$value){
        $res = DB::table('news')->where('n_id',$id)->update(['is_show'=>$value]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'操作失败，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'操作成功'];
    }
}
