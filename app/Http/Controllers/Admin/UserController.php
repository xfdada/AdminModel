<?php

/**
 * 用户
 * @author  xf
 * time 2020-1-13
 */
namespace App\Http\Controllers\Admin;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $user ;
    public function __construct()
    {
        $this->user = new User();

    }
    public function index(){
        return view('admin.User_list');
    }
    public function show($id){

    }

    public function is_show(Request $request,$id){
        $value = $request->input('value',1);
        return $this->user->is_show($id,$value);
    }
}
