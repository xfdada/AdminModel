<?php
/**
 * 评论模块
 * author xf
 * time 2020-1-13
 */
namespace App\Http\Controllers\Admin;
use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{

    public function index(){
        $product = DB::table('product')->select(['p_id','p_name'])->get();
        return view('admin.Comment_list',compact('product'));
    }
    public function replay(Request $request,$id){
        $comment = new Comment();
        $value = $request->input('replay','');
        return $comment->replay($id,$value);
    }
    public function is_show(Request $request,$id){
        $comment = new Comment();
        $value = $request->input('value',1);
        return $comment->is_show($id,$value);
    }
    public function destroy ($id){
        $comment = new Comment();
        return $comment->deletes($id);
    }
}
