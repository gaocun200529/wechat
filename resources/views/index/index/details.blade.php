@extends('layout.layout')
@section('title')
文章详情
@endsection

@section('content')
<table class="table">
	<tr>
		<td>序号</td>
		<td>{{$res->id}}</td>
	</tr>
	<tr>
		<td>标题</td>
		<td>{{$res->title}}</td>
	</tr>
	<tr>
		<td>发布时间</td>
		<td>{{$res->created_at}}</td>
	</tr>
	<tr>
		<td>图片</td>
		<td>
			@if($res->img)
			<img src="{{ asset('storage/'.$res->img) }}" style="max-width:100px;">
			@else
			无图片
			@endif
		</td>
	</tr>
	<tr>
		<td>作者</td>
		<td>{{$res->author}}</td>
	</tr>

	<tr>
		<td>浏览量</td>
		<td>{{$res->hits}}</td>
	</tr>

	<tr>
		<td>内容</td>
		<td>{!!$res->content!!}</td>
	</tr>

</table>

@endsection

