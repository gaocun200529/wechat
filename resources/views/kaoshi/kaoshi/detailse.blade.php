<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="2">
	<h2>收货人信息<input type="button" value="编辑"></h2>
		<tr>
			<td>收货人：</td>
			<td>电子邮箱：</td>
			<td>地址：</td>
			<td>邮编：</td>
			<td>电话：</td>
			<td>手机：</td>
			<td>标志性建筑：</td>
			<td>最佳收货时间：</td>
		</tr>

		@foreach($res as $v)
			<tr>
				<td>{{ $v->order_name }}</td>
				<td>{{ $v->emll }}</td>
				<td>{{ $v->dz }}</td>
				<td>{{ $v->xb }}</td>
				<td>{{ $v->sjh }}</td>
				<td>{{ $v->dh }}</td>
				<td>{{ $v->jz }}</td>
				<td>{{ $v->sj }}</td>
			</tr>
		@endforeach
	</table>


	<table border="2">
		<h2>商品信息<input type="button" value="编辑"></h2>
		<tr>
			<td>名称</td>
			<td>货号</td>
			<td>货品号</td>
			<td>价格</td>
			<td>数量</td>
			<td>属性</td>
			<td>库存</td>
			<td>小计</td>
		</tr>
		@foreach($resr as $v)
			<tr>
				<td>{{ $v->b_name }}</td>
				<td>{{ $v->b_huohao }}</td>
				<td>{{ $v->b_huohaos }}</td>
				<td>{{ $v->order_price }}</td>
				<td>{{ $v->b_sl }}</td>
				<td>{{ $v->b_sx }}</td>
				<td>{{ $v->b_kc }}</td>
				<td>{{ $v->b_xj }}</td>
				
			</tr>
		@endforeach
	</table>
</body>
</html>