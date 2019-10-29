<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="#" id="form" enctype="multipart/form-data">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	@csrf
	<input type="hidden" name="index_id" value="{{$res->index_id}}">
	姓名:<input type="text" name="index_name" id="index_name" value="{{$res->index_name}}"><br>
	年龄:<input type="text" name="index_age" id="index_age" value="{{$res->index_age}}"><br>
	性别:<select name="index_sex" value="{{$res->index_sex}}">
			<option value="">请选择..</option>
			<option value="男" @if($res['index_sex']=="男") selected @endif>男</option>
			<option value="女" @if($res['index_sex']=="女") selected @endif>女</option>
		</select><br>

	图片:<input type="file" name="index_img" value="{{$res->index_img}}"><br>
	<input type="button" value="修改" id="tj">

	</form>
</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	$('#tj').click(function(){
		var form=new FormData($('#form')[0]);
		var index_name=$('#index_name').val();
		var index_age=$('#index_age').val();
		if (index_name=='') {
			alert('姓名不能为空');
			return false;
		}

		if (index_age=='') {
			alert('年龄不能为空');
			return false;
		}

		$.ajax({
			  headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"/indexseupdata_do",
        type:'post',
        data:form,
        processData: false, 
     	contentType: false,
     	dataType:'json',
     	success:function(res){
     		if (res.err==1) {
     			alert(res.msg);
     			location.href="/indexseadd";
     		}else{
     			alert(res.msg);
     		}
     	}

		},'json')
	})

</script>