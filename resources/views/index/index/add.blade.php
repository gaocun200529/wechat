@extends('layout.layout')
@section('title')
文章添加
@endsection

@section('content')


<form action="{{action('Index\IndexController@add')}}" method="post" enctype="multipart/form-data">
	@csrf
  <div class="form-group">
    <label for="title">标题</label>
    <input type="text" class="form-control" id="title" placeholder="请输入标题" name="title" value="{{ old('title') }}">
  </div>
  <div class="form-group">
    <label for="author">作者</label>
    <input type="text" class="form-control" id="author" placeholder="请输入作者姓名" name="author" value="{{ old('author') }}">
  </div>
	
  <div class="form-group">
    <label for="img">缩略图</label>
    <input type="file" class="form-control" placeholder="" name="img" style="display: none;" id="uplouadField">
    <button class="btn btn-warning" id="img" type="button">上传缩略图</button>
	<div class="row">
	<div class="col-md-5">
		<img src="{{ asset('images/att_a.png') }}" alt="缩略图" class="img-thumbnail">
	</div>
	</div>

  </div>

  <div class="form-group">
    <label for="content">内容</label>
    <script id="content" name="content" type="text/plain" value="{{ old('content') }}">

	</script>
  </div>
  <div class="form-group">
    <label for="hits">浏览量</label>
    <input type="text" class="form-control" id="hits" placeholder="请输入浏览量" name="hits"  value="{{ old('hits') }}">
  </div>
  <button type="submit" class="btn btn-success">发表文章</button>
</form>

	 <script src="{{ asset('js/ueditor/ueditor.config.js') }}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{ asset('js/ueditor/ueditor.all.min.js') }}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('content');
        	//对编辑器的操作最好在编辑器ready之后再做
        	var content="{!! old('content') !!}";
			ue.ready(function() {
			    //设置编辑器的内容
			    ue.setContent(content);
			});

    </script>
@endsection

