@extends('layout.layout')
@section('title')
学生添加
@endsection


@section('content')
	<form action="{{action('Index\SubdentsController@inse')}}" method="POST">
	<table  class="table table-bordered">
	@csrf
		<tr>
			<td>学生姓名</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>学生年龄</td>
			<td><input type="number" name="age"></td>
		</tr>
		<tr>
			<td>学生性别</td>
			<td>
				<select name="sex">
					<option value="">请选择..</option>
					<option value="男">男</option>
					<option value="女">女</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button>添加</button></td>
		</tr>
	</table>

	</form>
@endsection