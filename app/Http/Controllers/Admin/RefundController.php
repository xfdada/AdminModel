<?php
/**
 * 退款管理
 * @author xf
 * time 2020-1-13
 */
namespace App\Http\Controllers\Admin;
use App\Model\Refund;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefundController extends Controller
{

    public function index(){
        return view('admin.Refund_list');
    }
    public function is_agree(Request $request,$id){
        $comment = new Refund();
        $value = $request->input('value',1);
        return $comment->is_show($id,$value);
    }
}
