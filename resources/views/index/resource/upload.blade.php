<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="/source_list">素材列表</a>
	<form action="/do_upload" method="post" enctype="multipart/form-data">
	@csrf
		类型:<select name="type" id="">
			<option value="image">图片</option>
			<option value="voice">音频</option>
			<option value="video">视频</option>
			<option value="thumb">缩率图</option>
		</select><br><br>
		<input type="file" name="rsource"><br><br>
		<input type="submit" value="提交">

	</form>
</body>
</html>