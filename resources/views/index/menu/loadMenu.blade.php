<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/create_menu" method="post">
	@csrf
		菜单等级 <select name="type" id="">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select><br/><br/>

		<div id="first_name">
			一级菜单名称: <input type="text" name="first_name">
		</div><br>

		<div id="name" style="display: none;">
			一级菜单名称: 
			<select name="name" id="">
			@foreach($first_menu as $v)
				<option value="{{ $v->id }}">{{$v->name}}</option>
			@endforeach	
			</select><br><br>	
				
			二级菜单名称:<input type="text" name="second_name">

		</div>
		
		<div id="event">
			菜单类型:
	        <select name="event" id="">
	            <option value="click">click</option>
	            <option value="view">view</option>
	        </select><br/><br/>
	        事件值
	        <input type="text" name="event_key">

		</div><br>
        
        <input type="submit" value="提交">
    </form>
	</form>

</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	$(function(){
		$("select[name=type]").change(function(){
			var type_val=$(this).val();
			if (type_val==2) {
				$('#event').show();
				$('#first_name').hide();
				$('#name').show();
			}else if(type_val==1) {
				$('#event').show();
				$('#first_name').show();
				$('#name').hide();
			}else if(type_val==3) {
				$('#event').hide();
				$('#first_name').show();
				$('#name').hide();
			}
		})
	})

</script>