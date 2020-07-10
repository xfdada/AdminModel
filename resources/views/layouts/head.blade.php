<html>
<head>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="keyword" content="@yield('keyword')"/>
        <meta name="author" content=""/>
    <title>@yield('title')</title>
        <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
        <!-- Vector CSS -->
        <link href="{{asset('plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
        <!-- simplebar CSS-->
        <link href="{{asset('plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
        <!-- Bootstrap core CSS-->
        <link href="{{asset('plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
        <!-- animate CSS-->
        <link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css"/>
        <!-- Icons CSS-->
        <link href="{{asset('css/icons.css')}}" rel="stylesheet" type="text/css"/>
        <!-- Sidebar CSS-->
        <link href="{{asset('css/sidebar-menu.css')}}" rel="stylesheet"/>
        <!-- Custom Style-->
        <link href="{{asset('css/app-style.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
    </head>
<body>
{{--@yield('sidebar')--}}

    <div id="wrapper">
        <!--侧边导航栏-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="../后台模板/index.html">
                    <img src="{{asset('images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">管理后台</h5>
                </a>
            </div>
            <div class="user-details">
                <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
                    <div class="avatar"><img class="mr-3 side-user-img" src="{{asset('images/avatars/avatar-13.png')}}" alt="user avatar"></div>
                    <div class="media-body">
                        <h6 class="side-user-name">admin</h6>
                    </div>
                </div>
                <div id="user-dropdown" class="collapse">
                    <ul class="user-setting-menu">
                        <li><a href="javaScript:void();"><i class="icon-user"></i>  My Profile</a></li>
                        <li><a href="javaScript:void();"><i class="icon-settings"></i> Setting</a></li>
                        <li><a href="javaScript:void();"><i class="icon-power"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>新闻管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="/my_admin/news/create"><i class="zmdi zmdi-long-arrow-right"></i>添加新闻</a></li>
                        <li><a href="/my_admin/news"><i class="zmdi zmdi-long-arrow-right"></i>新闻列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>用户管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="/my_admin/user"><i class="zmdi zmdi-long-arrow-right"></i>用户列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-layers"></i>
                        <span>产品管理</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="/my_admin/category"><i class="zmdi zmdi-long-arrow-right"></i> 类别管理</a></li>
                        <li><a href="/my_admin/productadd/create"><i class="zmdi zmdi-long-arrow-right"></i>添加产品</a></li>
                        <li><a href="/my_admin/productadd"><i class="zmdi zmdi-long-arrow-right"></i> 产品列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-layers"></i>
                        <span>订单管理</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="/my_admin/order"><i class="zmdi zmdi-long-arrow-right"></i>订单列表</a></li>
                        <li><a href="/my_admin/pay"><i class="zmdi zmdi-long-arrow-right"></i>支付列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-layers"></i>
                        <span>售后管理</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="/my_admin/refund"><i class="zmdi zmdi-long-arrow-right"></i>退款列表</a></li>
                        <li><a href="/my_admin/after_sell"><i class="zmdi zmdi-long-arrow-right"></i>售后列表</a></li>
                        <li><a href="/my_admin/after_sell"><i class="zmdi zmdi-long-arrow-right"></i>保修查询</a></li>
                        <li><a href="/my_admin/question"><i class="zmdi zmdi-long-arrow-right"></i>产品问题解答</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-card-travel"></i><span>资源管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="/my_admin/books"><i class="zmdi zmdi-long-arrow-right"></i>说明书管理</a></li>
                        <li><a href="/my_admin/resources"><i class="zmdi zmdi-long-arrow-right"></i>固件管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-chart"></i> <span>留言管理</span>
                        <i class="fa fa-angle-left float-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="/my_admin/message"><i class="zmdi zmdi-long-arrow-right"></i> 留言列表</a></li>
                        <li><a href="/my_admin/comment"><i class="zmdi zmdi-long-arrow-right"></i>评论列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-invert-colors"></i> <span>界面管理</span>
                        <i class="fa fa-angle-left float-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="/my_admin/banner"><i class="zmdi zmdi-long-arrow-right"></i>轮播图管理</a></li>
                        <li><a href="/my_admin/top_banner"><i class="zmdi zmdi-long-arrow-right"></i>顶部banner图管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-invert-colors"></i> <span>公司信息管理</span>
                        <i class="fa fa-angle-left float-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="/my_admin/banner"><i class="zmdi zmdi-long-arrow-right"></i>公司简介</a></li>
                        <li><a href="1"><i class="zmdi zmdi-long-arrow-right"></i>招聘信息管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-email"></i>
                        <span>经销商管理</span>
                        <i class="fa fa-angle-left float-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="12"><i class="zmdi zmdi-long-arrow-right"></i> 添加经销商</a></li>
                        <li><a href="123"><i class="zmdi zmdi-long-arrow-right"></i> 经销商列表</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <!--End sidebar-wrapper-->

        <!--头部-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
                            <i class="fa fa-envelope-open-o"></i><span class="badge badge-light badge-up">12</span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    You have 12 new messages
                                    <span class="badge badge-light">12</span>
                                </li>
                                <li class="list-group-item">
                                    <a href="javaScript:void();">
                                        <div class="media">
                                            <div class="avatar"><img class="align-self-start mr-3" src="{{asset('images/avatars/avatar-5.png')}}" alt="user avatar"></div>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">Jhon Deo</h6>
                                                <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                                <small>Today, 4:10 PM</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javaScript:void();">
                                        <div class="media">
                                            <div class="avatar"><img class="align-self-start mr-3" src="{{asset('images/avatars/avatar-6.png')}}" alt="user avatar"></div>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">Sara Jen</h6>
                                                <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                                <small>Yesterday, 8:30 AM</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javaScript:void();">
                                        <div class="media">
                                            <div class="avatar"><img class="align-self-start mr-3" src="{{asset('images/avatars/avatar-7.png')}}" alt="user avatar"></div>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">Dannish Josh</h6>
                                                <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                                <small>5/11/2018, 2:50 PM</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javaScript:void();">
                                        <div class="media">
                                            <div class="avatar"><img class="align-self-start mr-3" src="{{asset('images/avatars/avatar-8.png')}}" alt="user avatar"></div>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">Katrina Mccoy</h6>
                                                <p class="msg-info">Lorem ipsum dolor sit amet.</p>
                                                <small>1/11/2018, 2:50 PM</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item text-center"><a href="javaScript:void();">See All Messages</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
                            <i class="fa fa-bell-o"></i><span class="badge badge-info badge-up">14</span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    You have 14 Notifications
                                    <span class="badge badge-info">14</span>
                                </li>
                                <li class="list-group-item">
                                    <a href="javaScript:void();">
                                        <div class="media">
                                            <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">New Registered Users</h6>
                                                <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javaScript:void();">
                                        <div class="media">
                                            <i class="zmdi zmdi-coffee fa-2x mr-3 text-warning"></i>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">New Received Orders</h6>
                                                <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javaScript:void();">
                                        <div class="media">
                                            <i class="zmdi zmdi-notifications-active fa-2x mr-3 text-danger"></i>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">New Updates</h6>
                                                <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item text-center"><a href="javaScript:void();">See All Notifications</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item language">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                            <span class="user-profile"><img src="{{asset('images/avatars/avatar-13.png')}}" class="img-circle" alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3" src="{{asset('images/avatars/avatar-13.png')}}" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">Sarajhon Mccoy</h6>
                                            <p class="user-subtitle">mccoy@example.com</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->

        <div class="clearfix"></div>
        <!--主体内容-->
    @yield('content')
    <!--回到顶部按钮-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--Start 尾部-->
        <footer class="footer">
            <div class="container">
                <div class="text-center">
                    Copyright © 2018 <a href="http://www.17sucai.com">Fobia</a> Admin
                </div>
            </div>
        </footer>
        <!--End footer-->
    </div>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="https://www.layuicdn.com/layui/layui.js"></script>
<!-- simplebar js -->
<script src="{{asset('plugins/simplebar/js/simplebar.js')}}"></script>
<!-- 侧边栏菜单 js -->
<script src="{{asset('js/sidebar-menu.js')}}"></script>
<!-- Custom scripts -->
<script src="{{asset('js/app-script.js')}}"></script>
@yield('script')


</body>
</html>
