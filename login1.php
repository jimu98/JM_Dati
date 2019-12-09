<?php 
require 'config.php';
$user=isset($_POST['user'])?$_POST['user']:0;
$pass=isset($_POST['pass'])?md5($_POST['pass']):0;
$tmid=isset($_GET['tmid'])?$_GET['tmid']:0;
$tuichu=isset($_GET['tuichu'])?$_GET['tuichu']:0;
// echo $tmid;
if($tuichu==1){
	echo setcookie("user", NULL, time()-3600)?'退出成功，即将转入首页':'退出失败，即将转入首页';
	echo '<meta http-equiv="Refresh" content="2;url=index.php">';
}else{
$sql="select uid,pass from user where user='$user'";
$result=mysqli_query($link,$sql);
$zhuang=mysqli_fetch_assoc($result);
if(!isset($zhuang)){
	date_default_timezone_set("Asia/Shanghai");
	$date = date('Y-m-d H:i:s');
	$sql="insert into user (user,pass,time)value ('$user','$pass','$date')";
	$result=mysqli_query($link,$sql);
	setcookie("user", $user, time()+3600);
	echo $result?'注册正确，即将跳转首页':'注册失败，即将跳转首页';
	echo '<meta http-equiv="Refresh" content="2;url=index.php">';
}else{
	if($pass!=$zhuang['pass']){
		echo '密码错误，即将返回';
		echo '<meta http-equiv="Refresh" content="2;url=login.php">';
	}else{
		setcookie("user", $user, time()+3600);
		echo '密码正确，即将跳转首页';
		echo '<meta http-equiv="Refresh" content="2;url=index.php">';
	}
}	
}
?>
