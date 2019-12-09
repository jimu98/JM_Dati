<?php
	$DB_HOST = 'www.student.com';//服务器地址
	$DB_USER = 'root';// 用户名
	$DB_PWD = '';// 密码
	$DB_NAME = 'JM_dati';//数据库名
	$DB_PORT = '3306';// 端口
	$link=mysqli_connect($DB_HOST,$DB_USER,$DB_PWD,$DB_NAME,$DB_PORT);
	// echo $link?"成功":"失败";
	mysqli_set_charset($link,'utf8');
	$Kai_title = 'JM_Dati';//网页标题
	$Kai_gonggao ='这里是通知消息，修改位置在config.php';//首页的公告
	$Kai_foot = 'JM_Dati';//底部版权
	$cookie=isset($_COOKIE["user"])?$_COOKIE["user"]:NULL;
	// echo $cookie;
	$deng='';
	if($cookie!=NULL){
	    $dluser=$cookie;
	    if($dluser=='admin'){
	    	$deng="<li><a href=\"admin\">后台管理</a></li>";
	    	
	    }
	    $deng.="<li><a href=\"login1.php?tuichu=1\">退出登录</a></li>";
	}else{
	    $dluser="未登录";
	    $deng="<li><a href=\"login.php\">登录</a></li><li><a href=\"login.php\">注册</a></li>";
	}
?>
