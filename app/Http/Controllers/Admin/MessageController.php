<?php

namespace App\Http\Controllers\Admin;


use App\Model\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    protected $message ;
    public function __construct()
    {
        $this->message = new Message();;

    }
    public function index(){
        return view('admin.Message_list');
    }
    public function destroy ($id){
        return $this->message->deletes($id);
    }
    public function is_show(Request $request,$id){
        $value = $request->input('value',1);
        return $this->message->is_show($id,$value);
    }

    public function replay(Request $request,$id){
        $value = $request->input('replay','');
        return $this->message->replay($id,$value);
    }
}
