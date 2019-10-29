<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="orderse" method="get">
		订单号:<input type="text" name="order_sn">
		收货人:<input type="text" name="order_name">
		<select name="order_qr" id="">
			<option value="">代确认..</option>
			<option value="确认">确认</option>
			<option value="未确认">未确认</option>
		</select>
		<input type="submit" value="搜索">
	</form>
	<table border="2">
		<tr>
			<td>订单号</td>
			<td>下单时间</td>
			<td>收货人</td>
			<td>总金额</td>
			<td>应付金额</td>
			<td>订单状态</td>
			<td>操作</td>
		</tr>

		<tbody>
			@foreach($res as $v)
				<tr>
					<td>{{ $v->order_sn }}</td>
					<td>{{ $v->created_at }}</td>
					<td>{{ $v->order_name }}</td>
					<td>{{ $v->order_price }}</td>
					<td>{{ $v->order_prices }}</td>
					<td>{{ $v->order_qr }}</td>
					<td>
						<a href="{{ url('/detailse') }}?order_id={{ $v->order_id }}">详情</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{$res->links()}}
</body>
</html>