<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/indexseadd" method="get">
		姓名:<input type="text" name="index_name">
		年龄:<input type="text" name="index_age">
		性别:<select name="index_sex">
			<option value="">请选择..</option>
			<option value="男">男</option>
			<option value="女">女</option>
		</select>

		条件:<select name="order" id="">
			<option value="">请选择..</option>
			<option value="index_id">ID</option>
			<option value="index_age">年龄</option>
		</select>
		排序:<select name="order_do" id="">
			<option value="">请选择..</option>
			<option value="asc">升序</option>
			<option value="desc">倒序</option>
		</select>

		<input type="submit" value="搜索">

	</form>
		<table border="2">
					<tr>
			<td>序号</td>
			<td>姓名</td>
			<td>年龄</td>
			<td>性别</td>
			<td>图片</td>
			<td>操作</td>
		</tr>
		
		<tbody>
			@foreach($res as $v)	

				<tr>
					<td>{{ $v->index_id }}</td>
					<td>{{ $v->index_name }}</td>
					<td>{{ $v->index_age }}</td>
					<td>{{ $v->index_sex }}</td>
					<td>
					@if($v->index_img)
						<img src="{{ asset('storage/'.$v->index_img)}}" style="max-width: 100px;">
					@else
						无图片
					@endif
					</td>
					<td>
						<a href="{{ url('/indexsedel') }}?index_id={{ $v->index_id }}" id="del">删除</a>
						<a href="{{ url('/indexseupdata') }}?index_id={{ $v->index_id }}">修改</a>
					</td>
	
				</tr>

			@endforeach

		</tbody>


	 </table>
	{{$res->links()}}
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
					alert("删除成功");
				}else{
					alert("删除失败");
				}
			}
		});

		$(this).parent().parent().remove();
	})

</script>