// juqery自定义js
$(function(){
		$('#img').click(function(e){
			$("#uplouadField").click();
		});

	$("#uplouadField").on('change',function(e){
		$file=$(this)[0].files[0];
		// console.log($file);
		// 将图片显示到缩图中
		 var reader=new FileReader();
		 reader.readAsDataURL($file);
		 reader.onload=function(){
            //console.log(reader.result);
            /*展示*/
            $(".img-thumbnail").attr("src",reader.result);
        }
	});

	// 全选
		$('#checkall').click(function(e){
			$('[name="id[]"]').prop('checked',$(this).prop('checked'));
			})


	// 批删
		$('#delete').click(function(){
		var  box = $("input[name='id[]']");  
	        length =box.length;  
	       //alert(length);  
	       var str ="";  
	      for(var i=0;i<length;i++){  
	           if(box[i].checked==true){  
	                str =str+","+box[i].value;  
	          }  
	          
	       }  
	     str= str.substr(1)  
       //alert(str)    
         
       location.href="dels?id="+str;  


		})

	

})