@extends('layout.layout')
@section('title')
学生添加
@endsection


@section('content')

	<form action="{{action('Index\SubdentsController@update_dos')}}" method="POST">
	<input type="hidden" name="id" value="{{$res->id}}">
	<table  class="table table-bordered">
	@csrf
		<tr>
			<td>学生姓名</td>
			<td><input type="text" name="name" value="{{$res->name}}"></td>
		</tr>
		<tr>
			<td>学生年龄</td>
			<td><input type="number" name="age" value="{{$res->age}}"></td>
		</tr>
		<tr>
			<td>学生性别</td>
			<td>
				<select name="sex" value="{{ $res->sex }}">
					<option value="">请选择..</option>
					<option value="男" @if($res['sex']=='男') selected @endif>男</option>
					<option value="女" @if($res['sex']=='女') selected @endif>女</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button>修改</button></td>
		</tr>
	</table>

	</form>
@endsection