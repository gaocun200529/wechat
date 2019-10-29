<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/pushTag" method="post">	
		@csrf
		<input type="hidden" name="tagid" value="{{ $tagid }}">
		<textarea name="message" id="" cols="30" rows="10"></textarea>
		<input type="submit" value="提交">

	</form>
</body>
</html>