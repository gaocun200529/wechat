<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2><a href="/addTag">添加</a></h2>
	<h2><a href="/wexinlist">粉丝列表</a></h2>
	<table border="1">
		<tr>
			<td>标签ID</td>
			<td>标签名称</td>
			<td>操作</td>
		</tr>
		@foreach($data as $v)
		<tr>
			<td>{{ $v['id'] }}</td>
			<td>{{ $v['name'] }}</td>
			<td>
				<a href="{{ url('tagdal') }}?tag_id={{ $v['id'] }}">删除</a>
				<a href="{{ url('tagupdate') }}?tag_id={{ $v['id'] }}&&tag_name={{ $v['name'] }}"">修改</a>
				<a href="{{ url('wexinlist') }}?tag_id={{ $v['id'] }}">给用户打标签</a>
				<a href="{{ url('push_tag_mag') }}?tag_id={{ $v['id'] }}">发信息</a>
			</td>
		</tr>
		@endforeach
	</table>

</body>
</html>