<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/do_addTag" method="post">
		@csrf
			标签名称:<input type="text" name="tag_name"><br>
					<input type="submit" value="添加">

	</form>
</body>
</html>