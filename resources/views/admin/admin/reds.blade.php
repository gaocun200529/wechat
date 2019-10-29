<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>注册</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
<link rel="stylesheet" href="lib/weui.min.css">
<!-- <link rel="stylesheet" href="public/css/jquery-weui.css"> -->
<link rel="stylesheet" href="public/css/style.css">

</head>

<body ontouchstart>
<!--主体-->
<header class="wy-header">
  <div class="wy-header-icon-back"><span></span></div>
  <div class="wy-header-title" >账号注册</div>
</header>
<div class="weui-content">
  <div class="weui-cells weui-cells_form wy-address-edit">
    <div class="weui-cell weui-cell_vcode">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">您的账号</label></div>
      <div class="weui-cell__bd"><input class="weui-input" id='user_name' name="user_name" type="tel" placeholder="请输入账号"></div>
      <div class="weui-cell__ft"></div>
    </div>
    </div>
 <div class="weui-cell">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">设置密码</label></div>
      <div class="weui-cell__bd"><input class="weui-input" id='user_pwd' name="user_pwd" type="password"  placeholder="请输入您的密码"></div>
    </div>
  </div>

  <div class="weui-btn-area"><button type="" class="aaa weui-btn weui-btn_warn">注册并跳转到登陆</button></div>
  <div class="weui-btn-area"><a href="{{url('logins')}}" class="weui-btn weui-btn_warn">如果有账号点击这里登陆</a></div>
  <h1><div class="weui-cells__tips t-c font-12">注册成功自动跳转到登录页面<br>注册失败自动跳转到注册页面</div></h1>

</div>
<script src="lib/jquery-2.1.4.js"></script>
<script src="lib/fastclick.js"></script>
<script type="text/javascript" src="js/jquery.Spinner.js"></script>\
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
  // $(function() {
  //   FastClick.attach(document.body);
  // });
$('.aaa').click(function(){
    var user_name=$('#user_name').val();
    var user_pwd=$('#user_pwd').val();
    var name= /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,}$/;
    if(user_name==''){
      alert('用户名不能空');
      return false;
    }else if(!name.test(user_name)){
      alert('用户名长度要大于6位，由数字和字母组成');
      return false;
    };
    if(user_pwd==''){
      alert('密码不能空');
      return false;
    }
    $.post(
      '/redsadd',
      {user_name:user_name,user_pwd:user_pwd},
      function(res){
          if(res.err==1){
            alert(res.msg);
             location.href='/logins';
          }else{
             alert(res.msg);
          }
      },
      'json'
    );
 })
</script>

<script src="js/jquery-weui.js"></script>
</body>
</html>
