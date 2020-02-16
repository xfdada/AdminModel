<?php
/**
 * 评论模块
 * author xf
 * time 2020-1-13
 */
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CommentController extends Controller
{

    public function index(){
        return view('admin.Comment_list');
    }

}
