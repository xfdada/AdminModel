<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'o_id';
    //
    public function saves($data){
        $datas = [
            'o_number'=>$data['o_number'],//订单号
            'o_title'=>$data['o_title'],//订单名称
            'o_content'=>$data['o_content'],//订单详情
            'user_id'=>$data['user_id'],//用户
            'addr_id'=>$data['addr_id'],//地址
            'o_money'=>$data['o_money'],//总价
            'coupon'=>$data['coupon'],//折扣
            'o_time'=>date('Y-m-d H:i:s',time())
        ];
        if($data ==''){
            return ['code'=>5,'msg'=>'所填字段不能为空','data'=>''];
        }
        $res = DB::table('order')->insert($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'操作失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'添加成功','data'=>''];
    }

    public function updates($id,$data){
        $datas = [
            'b_name'=>$data['b_name'],
            'b_url'=>$data['b_url'],
            'pr_id'=>$data['pr_id'],
        ];
        $res = DB::table('book')->where('b_id',$id)->update($datas);
        if(!$res){
            return ['code'=>5,'msg'=>'更新失败，请重试','data'=>''];
        }
        return ['code'=>0,'msg'=>'更新成功','data'=>''];
    }
    public function edit($id){
        if ($id){
            $res = DB::table('book')->where('b_id',$id)->first();
            if($res){
                return $res;
            }
        }
        return false;
    }

    public function getList($page,$limit){

        $start = ($page-1)*$limit;
        $data = DB::table('order') ->join('user','order.o_id','=','user.user_id')
            ->join('address','order.addr_id','=','address.addr_id')
            ->select('order.*', 'user.user_name', 'address.addr_pro', 'address.addr_city', 'address.addr_dist', 'address.addr_detail')
            ->orderBy('o_time','desc')->offset($start)->limit($limit)->get();
        $count = DB::table('order')->count('o_id');
        return ['count'=>$count,'code'=>0,'data'=>$data,'msg'=>''];
    }


    public function is_show($id){
        $res = DB::table('book')->where('o_number',$id)->update(['is_delete'=>1]);
        if(!$res){
            return ['code'=>5,'data'=>'','msg'=>'删除成功，请重试'];
        }
        return ['code'=>0,'data'=>'','msg'=>'删除成功'];
    }
}
