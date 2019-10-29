<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="/tag_user" method="post">
@csrf
	<input type="hidden" name="tag_id" value="{{ $tag_id }}">
	<table>
		<tr>
			<td></td>
			<td>用户的昵称</td>
			<td>用户的性别</td>
			<td>用户所在城市</td>
			<td>用户头像</td>
			<td>用户关注时间</td>
		</tr>

	@foreach($dtinfo as $v)
		<tr>
			<td><input type="checkbox" name="opneid_list[]" value="{{$v['openid']}}"></td>
			<td>{{ $v['nickname'] }}</td>
			<td>{{ $v['sex'] }}</td>
			<td>{{ $v['city'] }}</td>
			<td><img src="{{ $v['headimgurl'] }}" alt=""></td>
			<td>{{ date('Y-m-d H:i:s',$v['subscribe_time']) }}</td>
			<td>
				<a href="{{ url('user_tag') }}?openid={{$v['openid']}}">查看用户标签</a>
				<a href="{{ url('push_template_msg') }}?openid={{$v['openid']}}">用户发消息</a>
			</td>
		</tr>
	@endforeach

	</table>
	<input type="submit" value="提交">
	</form>
</body>
</html>