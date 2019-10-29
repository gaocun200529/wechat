<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/redse_do" method="post" id="form">
		<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- @if (count($errors) > 0)
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
              @endforeach
      </ul>
     </div>
@endif -->
	@csrf
		用户:<input type="text" name="user_name" id="user_name"><br>
		密码:<input type="password" name="user_pwd" id="user_pwd"><br>
		确认密码:<input type="password" name="user_pwd1" id="user_pwd1"><br>
		<input type="button" value="注册" id="red">
		<a href="{{ url('loginse') }}">已有账号,点击登陆</a>
			

	</form>
</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
$('#user_name').blur(function(){
			var user_name = $(this).val();
			$.ajax({
				headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       		},
				url:"{{url('weiyi')}}",
	       		type:'post',
	       		data:{user_name:user_name},
	       		dataType:'json',
	       		async:true,
	       		success:function(res){
	       			if (res.error==1) {
	       				alert(res.msg);
	       				return $('#red').prop('disabled',true);
	       			}else{
	       				alert(res.msg);
	       				return $('#red').prop('disabled',false);
	       			}
	       		}
			});
		});
	$('#red').click(function(){
		var form=$('#form').serialize();
		var user_name=$('#user_name').val();
		var user_pwd=$('#user_pwd').val();
		var user_pwd1=$('#user_pwd1').val();
		if (user_name=='') {
			alert('用户名不能为空');
			return false;
		}

		if (user_pwd=='') {
			alert('密码不能为空');
			return false;
		}

		if (user_pwd1=='') {
			alert('确认密码不能为空');
			return false;
		}

		if (user_pwd!=user_pwd1) {
			alert('密码与确认密码不一致');
			return false;
		}
		

		$.ajax({
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		},
       		url:'redse_do',
       		type:'post',
       		data:form,
       		dataType:'json',
       		async:true,
       		success:function(res){
       			if (res.error==1) {
       				alert(res.msg);
       				location.href="/loginse";
       			}else{
       				return alert(res.msg);
       			}
       		}

		},'json');



	})

</script>
