<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use resources\Verify\Verify;
class LoginController extends Controller{
    public function index(){
        return view('admin.login');
    }

    public function Captcha(){
        $captcha = new Verify();
        return $captcha->entry();
    }
}
