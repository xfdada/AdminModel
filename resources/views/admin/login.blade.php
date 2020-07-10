<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>朗强后台登录</title>
  <!--favicon-->
  <link rel="icon" href="{{asset('/images/favicon.ico')}}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{asset('/css/app-style.css')}}" rel="stylesheet"/>
  
</head>

<body>

<div id="wrapper" style="padding-top:10%; ">
  <div class="card-authentication2 mx-auto my-5">
    <div class="card-group">
      <div class="card mb-0">
        <div class="bg-signin2"></div>
        <div class="card-img-overlay rounded-left my-5">
          <h2 class="text-white">Lorem</h2>
          <h1 class="text-white">Ipsum Dolor</h1>
          <p class="card-text text-white pt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
        </div>
      </div>

      <div class="card mb-0 ">
        <div class="card-body">
          <div class="card-content p-3">
            <div class="text-center">
              <img src="{{asset('/images/logo-icon.png')}}" alt="logo icon">
							 </div>
							 <div class="card-title text-uppercase text-center py-3">登录</div>
							 <form>
								 <div class="form-group">
									 <div class="position-relative has-icon-left">
										 <label for="exampleInputUsername" class="sr-only">用户名</label>
										 <input type="text" id="exampleInputUsername" class="form-control" placeholder="用户名">
										 <div class="form-control-position">
											 <i class="icon-user"></i>
										 </div>
									 </div>
								 </div>
								 <div class="form-group">
									 <div class="position-relative has-icon-left">
										 <label for="exampleInputPassword" class="sr-only">密码</label>
										 <input type="password" id="exampleInputPassword" class="form-control" placeholder="密码">
										 <div class="form-control-position">
											 <i class="icon-lock"></i>
										 </div>
									 </div>
								 </div>
                               <div class="form-group">
                                 <div class="position-relative has-icon-left" style="display: flex;">
                                   <label for="exampleInputPassword" class="sr-only">验证码</label>
                                   <input type="text" id="exampleInputPassword" class="form-control" style="width: 50%;height: 50px" placeholder="验证码">
                                   <div class="form-control-position">
                                     <i class="icon-lock"></i>
                                   </div>
                                   <div style="width: 50%;"><img id="code" src="/my_admin/login/captcha" alt="" onclick="this.src='/my_admin/login/captcha/'+Math.random()"></div>
                                 </div>
                               </div>
								 <div class="form-row mr-0 ml-0">
									 <div class="form-group col-6">
										 <div class="icheck-material-primary">
											 <input type="checkbox" id="user-checkbox" checked="" />
											 <label for="user-checkbox">记住我</label>
										 </div>
									 </div>
									 <div class="form-group col-6 text-right">
										 <a  onclick="change()">点击切换图片</a>
									 </div>
								 </div>
								 <button type="button" class="btn btn-primary btn-block waves-effect waves-light">登录</button>
							 </form>
						 </div>
					 </div>
				 </div>
			 </div>
		 </div>
	</div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('/js/jquery.min.js')}}"></script>
  <script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script>
    function change(){
        $("#code").attr('src','/my_admin/login/captcha/'+Math.random());
    }
</script>
</body>
</html>
