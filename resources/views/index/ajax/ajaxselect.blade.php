@extends('layout.layout')
@section('title')
文章添加
@endsection

@section('content')

<table border="2">
	<tr>
		<td>ID</td>
		<td>姓名</td>
		<td>年龄</td>
		<td>性别</td>
		<td>添加时间</td>
		<td>操作</td>
	</tr>
	
	<tbody id="list">
	@foreach($res as $v)
	
	<tr>
		<td>{{ $v->id }}</td>
		<td>{{ $v->name }}</td>
		<td>{{ $v->age }}</td>
		<td>{{ $v->sex }}</td>
		<td>{{ $v->created_at }}</td>
		<td>
			<a href="{{ url('/ajaxdel') }}?id={{ $v->id }}" id="del">删除</a>
			<a href="{{ url('ajaxupdate') }}?id={{ $v->id }}">修改</a>
		</td>
	</tr>

	@endforeach
	<tbody>
</table>

{{ $res->links() }}

<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	$(document).on('click','#del',function(){
		if (window.confirm('是否确认删除')) {
		event.preventDefault();//阻止默认事件行为的触发。 
		var url=$(this).attr('href');//获取删除的a标签
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
		}
	})

</script>

@endsection