<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>{{ env('APP_NAME') }}--@yield('title')</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/article.js') }}"></script>
	<script src="{{ asset('js/jq.js') }}"></script>
	
<body>

<!-- 顶部导航栏 -->
	
<nav class="navbar navbar-inverse">
  <div class="container">
   	  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">{{env('APP_NAME')}}</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">首页</a></li>
        <li><a href="#">文章</a></li>
        <li><a href="#">动态</a></li>
        
        @guest
		  	<li><a href="{{ route('login') }}">登陆</a></li>
		@endauth

		@auth
		    <li class="nav-item dropdown">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 {{ Auth::user()->name }} <span class="caret"></span>
                 </a>

          	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{ route('logout') }}">
                    退出
             </a>
           </div>
         </li>
		@endguest
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>

<!-- 大的banner -->

<div class="jumbotron" style="margin-top: 50px;">
  <div class="container">
   	  <h1>Hello, world!</h1>
	  <p>...</p>
	  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
  </div>
</div>

<div class="container">
<div class="row">
<!-- 左边菜单栏 -->
	<div class="col-md-3">
	@section('slide')
		<div class="list-group">
		  <a href="#" class="list-group-item active">
		   导航栏
		  </a>
		  <a href="/index" class="list-group-item">文章列表</a>
		  <a href="/add" class="list-group-item">文章添加</a>
		  <a href="/select" class="list-group-item">学生列表</a>
		  <a href="/inse" class="list-group-item">学生添加</a>
		   <a href="/ajaxselect" class="list-group-item">Ajax列表</a>
		  <a href="/ajaxadd" class="list-group-item">Ajax添加</a>
		</div>
	@show
	</div>
	
	<!-- 右边内容栏 -->
	<div class="col-md-8" style="padding-bottom: 70px">
		@if($errors->any())
		<div>
			@foreach($errors->all() as $error)
				<div class="alert alert-warning" role="alert">{{ $error }}</div>
			@endforeach
		</div>
		
		@endif
		@yield('content')
	</div>
</div>
</div>
<div id="footer" class="navbar-fixed-bottom" style="background-color: #eee;border-top: 1px solid #ddd; height: 50px; line-height: 40px;">
	<div class="container">
		<div class="row">
			<p>1903A版权所有</p>
		</div>
	</div>
</div>
	
</head>
</body>
</html>