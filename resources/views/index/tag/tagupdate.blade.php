<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/tagupdate_do" method="post">
		@csrf
		<input type="hidden" name="tag_id" value="{{ $tag_id }}">
			标签名称:<input type="text" name="tag_name" value="{{ $tag_name }}"><br>
					<input type="submit" value="修改">

	</form>
</body>
</html>