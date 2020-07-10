<?php

namespace App\Http\ViewComposer;
use App\Model\Category;
use Illuminate\View\View;
class BaseInfo
{
    protected $cate;
    public function __construct(Category $cate)
    {
        $this->cate = $cate;
    }

    public function compose(View $view)
    {

        $menu_f= $this->cate->getMenu(1);//1级菜单
        $menu_s= $this->cate->getMenu(2);//2级菜单
        $menu_t= $this->cate->getMenu(3);//3级菜单
        $view->with([
            'menu_f' =>$menu_f,
            'menu_s' =>$menu_s,
            'menu_t' =>$menu_t,
        ]);
    }
}