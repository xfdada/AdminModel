<?php
/**
 * 售后模块
 * @author  xf
 * time 2020-1-13
 */
namespace App\Http\Controllers\Admin;
use App\Model\AfterSell;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AfterSellController extends Controller
{

    public function index(){
        return view('admin.AfterSell_list');
    }


    public function is_agree(Request $request,$id){
        $comment = new AfterSell();
        $value = $request->input('value',1);
        return $comment->is_show($id,$value);
    }
}
