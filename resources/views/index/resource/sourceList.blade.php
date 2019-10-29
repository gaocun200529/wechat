<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>素材管理</h1>
	<a href="/uploads">上传永久素材</a>
	<table border="1">
		
		<tr>
			<td>id</td>
			<td>media_id</td>
			<td>path</td>
			<td>type</td>
			<td>添加时间</td>
			<td>操作</td>
		</tr>
		@foreach($res as $v)
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->media_id }}</td>
			<td>
				<a href="{{ $v->path }}">点击查看</a>

			</td>
			<td>
				@if($v->type==1)图片@elseif($v->type==2)音频@elseif($v->type==3)视频@elseif($v->type==4)缩率图@endif
			</td>
			<td>{{ date('Y-m-d H:i:s',$v->addtime) }}</td>
			<td>
				<a href="{{ url('download') }}?id={{ $v->id }}&media_id={{ $v->media_id }}&type={{ $v->type }}">下载资源</a>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>