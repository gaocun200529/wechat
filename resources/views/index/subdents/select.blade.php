@extends('layout.layout')
@section('title')
学生列表
@endsection

@section('content')
	<form action="/select" method="get">
		姓名:<input type="text" name="name">
		年龄:<input type="text" name="age">
		性别<select name="sex" id="">
			<option value="">请选择..</option>
			<option value="男">男</option>
			<option value="女">女</option>
		</select>

		条件:<select name="order">
			<option value="">请选择..</option>
			<option value="id">id</option>
			<option value="age">年龄</option>
		</select>
		排序:<select name="order_do" id="">
			<option value="">请选择..</option>
			<option value="asc">升序</option>
			<option value="desc">倒序</option>
		</select>
		<input type="submit" value="搜索">
	</form>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>序号</th>
				<th>学生姓名</th>
				<th>年龄</th>
				<th>性别</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
		</thead>
		@foreach($list as $v)
		<tbody>
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->age}}</td>
				<td>{{$v->sex}}</td>
				<td>{{$v->created_at}}</td>
				<td>
					<a href="{{url('updates')}}?id={{$v->id}}" class="btn btn-small btn-primary">修改</a>
					<a href="{{url('delete')}}?id={{$v->id}}" class="btn btn-danger btn-small">删除</a>
				</td>
			</tr>
		</tbody>
		@endforeach
	</table>
	{{$list->links()}}
@endsection