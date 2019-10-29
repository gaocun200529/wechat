<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="zsgcselect" method="get">
		用户名:<input type="text" name="name" id="name">
			年龄： <input type="text" name="age" id="age">
			性别:<select name="sex" id="">
				<option value="">请选择..</option>
				<option value="男">男</option>
				<option value="女">女</option>
			</select>
			条件:<select name="order" id="">
				<option value="">请选择..</option>
				<option value="id">ID</option>
				<option value="age">年龄</option>
			</select>
			排序:<select name="order_do" id="">
				<option value="">请选择..</option>
				<option value="asc">升序</option>
				<option value="desc">降序</option>
			</select>
			<input type="submit" value="搜索">
		</form>
		<table border="2">
			<tr>
				<td>用户名</td>
				<td>年龄</td>
				<td>性别</td>
				<td>添加时间</td>
				<td>修改时间</td>
				<td>操作</td>
			</tr>

			@foreach($res as $v)
				<tr>
					<td>{{ $v->name }}</td>
					<td>{{ $v->age }}</td>
					<td>{{ $v->sex }}</td>
					<td>{{ $v->created_at }}</td>
					<td>{{ $v->updated_at }}</td>
					<td>
						<a href="{{ url('daleteso')}}?id={{ $v->id }}" id="del">删除</a>
						<a href="{{ url('updateso')}}?id={{ $v->id }}">修改</a>
					</td>
	
				</tr>

			@endforeach

		</table>

</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	$(document).on('click','#del',function(){
		event.preventDefault();
		var url=$(this).attr('href');
		$.ajax({
			url:url,
			success:function(res){
				if (res==1) {
					alert('删除成功');
				}else{
					alert('删除失败');
				}
			}
		})
		$(this).parent().parent().remove();
	})

</script>