<?php
/**
 * 轮播图模块
 * author xf
 * time 2020-1-19
 */
namespace App\Http\Controllers\Admin;
use App\Model\TopBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopBannerController extends Controller
{
    protected $banner ;
    public function __construct()
    {
        $this->banner = new TopBanner();

    }

    public function index(){
        return view('admin.TopBanner_list');
    }
    //显示添加页面
    public function create(){
        return view('admin.TopBanner_create');
    }
    //产品添加 存储到数据库
    public function store(Request $request){

        $data = $request->input('data',[]);
        return  $this->banner->saves($data);
    }
    public function edit($id){
        $res = $this->banner->edit($id);
        if(!$res){
            return view('error');
        }
        return view('admin.TopBanner_edit',compact('res'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        return $this->banner->updates($id,$data['data']);
    }

    public function destroy ($id){
        return $this->banner->deletes($id);
    }
    //轮播图排序
    public function sort(Request $request,$id){
        $value = $request->input('index',0);
        return $this->banner->sort($id,$value);
    }

}
