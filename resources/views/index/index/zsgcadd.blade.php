<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
		<form action="#" id="form">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@csrf
			用户名:<input type="text" name="name" id="name"><br>
			年龄： <input type="text" name="age" id="age"><br>
			性别:<select name="sex" id="">
				<option value="">请选择..</option>
				<option value="男">男</option>
				<option value="女">女</option>
			</select><br>
			<input type="button" value="添加" id="tj"><br>
		</form>
</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	$('#name').blur(function(){
		var name=$(this).val();
		$.ajax({
			  headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'weiyixing',
        type:'post',
        data:{name:name},
        dataType:'json',
        async:true,
        success:function(res){
        	if (res.err==1) {
        		alert(res.msg);
        		return $('#tj').prop('disabled',true);
        	}else{
        		alert(res.msg);
        		return $('#tj').prop('disabled',false);
        	}
        }

		})
	})

	$('#tj').click(function(){
		var form=$('#form').serialize();
		var name=$('#name').val();
		var age=$('#age').val();
		if (name=='') {
			alert('姓名不能为空');
			return false;
		}

		if (age=='') {
			alert('年龄不能为空');
			return false;
		}

		$.ajax({
			  headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'zsgcadd_do',
        type:'post',
        data:form,
        dataType:'json',
        async:true,
        success:function(res){
        	if (res.err==1) {
        		alert('添加成功');
        		location.href="zsgcselect";
        	}else{
        		alert('添加失败');
        	}
        }

		})
	})

</script>