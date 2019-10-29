<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>登陆</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
<link rel="stylesheet" href="lib/weui.min.css">
<link rel="stylesheet" href="css/jquery-weui.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body ontouchstart style="background:#323542;">
<!--主体-->
<div class="login-box">
    <div class="lg-title">欢迎登闯霸霸商城</div>
    <div class="login-form">
            <div class="login-user-name common-div">
                <span class="eamil-icon common-icon">
                    <img src="images/eamil.png" />
                </span>
                <input type="text" name="user_name" id='user_name' value="" placeholder="请输入您的账号" />
            </div>
            <div class="login-user-pasw common-div">
                <span class="pasw-icon common-icon">
                    <img src="images/password.png" />
                </span>
                <input type="password" name="user_pwd" id='user_pwd' value="" placeholder="请输入您的密码" />
            </div>
             <div class="weui-btn-area"><button class="aaa weui-btn weui-btn_warn" type="">登陆</button>
              <h1><div class="weui-cells__tips t-c font-12">登录成功自动跳转到首页<br>登陆失败自动跳转到登录页面</div></h1></div>
            <!-- <a href="{{ url('') }}" class="login-btn common-div">登陆</a> -->
    </div>
    <div class="forgets">
        <a href="{{ url('reds') }}">免费注册</a>
    </div>
</div>
<script src="lib/jquery-2.1.4.js"></script>
<script src="lib/fastclick.js"></script>
<script type="text/javascript" src="js/jquery.Spinner.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
  $('.aaa').click(function(){
    var user_name=$('#user_name').val();
    var user_pwd=$('#user_pwd').val();
    if(user_name==''){
      alert('用户名不能空');
      return false;
    }
    if(user_pwd==''){
      alert('密码不能空');
      return false;
    }
    $.post(
      '/loginsadd',
      {user_name:user_name,user_pwd:user_pwd},
      function(res){
          if(res.err==1){
            alert(res.msg);
             location.href='/admngindex';
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
