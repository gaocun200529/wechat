<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form>	
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@csrf
		用户名:<input type="text" name="user_name" id="user_name"><br>	
		密码:<input type="password" name="user_pwd" id="user_pwd"><br>
		<input type="button" value="登陆" id="loginse"><br>
		<a href="{{ url('redse') }}">点击注册</a>
	</form>
</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	$('#loginse').click(function(){
		var user_name=$('#user_name').val();
		var user_pwd=$('#user_pwd').val();
		$.ajax({
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	},
        	url:"loginse_do",
        	type:'post',
        	data:{user_name:user_name,user_pwd:user_pwd},
        	dataType:'json',
        	async:true,
        	success:function(res){
        		if (res.msg==3) {
        			alert(res.fond);
        			location.href="/indexse";
        		}else{
        			alert(res.fond);
        		}
        	}

		},'json');

	})

</script>
