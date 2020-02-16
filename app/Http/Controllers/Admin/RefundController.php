<?php
/**
 * 退款管理
 * @author xf
 * time 2020-1-13
 */
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefundController extends Controller
{

    public function index(){
        return view('admin.Refund_list');
    }

}
