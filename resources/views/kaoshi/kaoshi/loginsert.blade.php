<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="#">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@csrf
		用户名:<input type="text" name="user_name" id="user_name"><br>
		密码：<input type="password" name="user_pwd" id="user_pwd"><br>
		<input type="button" value="登陆" id="login">
	</form>
</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	$('#login').click(function(){
		var user_name=$('#user_name').val();
		var user_pwd=$('#user_pwd').val();
		$.ajax({
			 headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

			url:'/loginsert_do',
			type:"post",
			data:{user_name:user_name,user_pwd:user_pwd},
			dataType:'json',
			success:function(res){
				if (res.msg==2) {
					alert(res.fond);
					location.href="/orderse";
				}else{
					alert(res.fond);
				}
			}
		},'json')
	})

</script>