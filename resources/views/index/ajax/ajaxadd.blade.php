@extends('layout.layout')
@section('title')
Ajax添加

@endsection

@section('content')
<form action="{{ action('Index\Ajaxindex@ajaxadd_do') }}" method="post" id="form">
<meta name="csrf-token" content="{{ csrf_token() }}">
@csrf
	<table>
		<tr>
			<td>姓名</td>
			<td><input type="text" name="name" id="name"></td>
		</tr>

		<tr>
			<td>年龄</td>
			<td><input type="text" name="age" id="age"></td>
		</tr>
	<tr>
			<td>性别</td>
			<td>
				<select name="sex" id="">
					<option value="">请选择..</option>
					<option value="男">男</option>
					<option value="女">女</option>
				</select>
			</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<button type="button" id="tj">添加</button>
		</td>
	</tr>
</table>
</form>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
$(function(){
	$('#tj').click(function(e){
		var form=$("#form").serialize(); 
		var name=$('#name').val();
		var age=$('#age').val();
		if (name=="") {
			alert('姓名不能为空');
			return false;
		}

		 if(age==""){
			alert('年龄不能为空');
			return false;
		}

		$.ajax({
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		 },
       		url:"ajaxadd_do",
       		type:'POST',
       		data:form,
       		dataType:"json",
       		async:true,
       		success:function(res){
       			if (res.error==1) {
       				alert(res.msg);
       				location.href="/ajaxselect";
       			}else{
       				alert(res.msg);
       			}
       		}


		},'json');

	})

})
</script>

@endsection