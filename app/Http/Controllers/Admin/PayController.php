<?php
/**
 * 支付管理   // 该模型现在存在问题，还未确定有哪些字段。
 * @author xf
 * time 2020-1-13
 */
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{

    public function index(){
        return view('admin.Pay_list');
    }

}
