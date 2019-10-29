<?php 
	$array=range(1,20);
	// var_dump($array);
	// array_map(function($v){
	// 	echo $v;
	// },$array)
	// $newarr=array_filter($array,function($v){
	// 	if ($v>3&&$v<10) {
	// 		return true;
	// 	}
	// 	return false;


	// });
	// array_walk($array, function($v,$k) use (&$i){
	// 	echo "<br>",$i,':',$k,':',$v;
	// 	$i++;
	// });
	// var_dump($i);

	//参数的传递方式 1值传递 2引用传递
	function dom(&$v){
		$v++;
		echo "<br>","体内的\$v",$v;
	}
	$a=10;
	echo "体外的\$a",$a;
	dom($a);

 ?>