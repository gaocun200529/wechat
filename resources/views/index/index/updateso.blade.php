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
		<input type="hidden" name="id" value="{{ $res->id }}">
			用户名:<input type="text" name="name" id="name" value="{{ $res->name }}"><br>
			年龄： <input type="text" name="age" id="age" value="{{ $res->age }}"><br>
			性别:<select name="sex" id="">
				<option value="">请选择..</option>
				<option value="男" @if($res['sex']=="男") selected @endif>男</option>
				<option value="女" @if($res['sex']=='女') selected @endif>女</option>
			</select><br>
			<input type="button" value="修改" id="tj"><br>
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
        url:'updateso_do',
        type:'post',
        data:form,
        dataType:'json',
        async:true,
        success:function(res){
        	if (res.err==1) {
        		alert('修改成功');
        		location.href="zsgcselect";
        	}else{
        		alert('修改失败');
        	}
        }

		})
	})

</script>