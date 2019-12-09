<?php 
require 'config.php';

$text=isset($_POST['text'])?$_POST['text']:NULL;
$user=isset($_POST['user'])?$_POST['user']:NULL;
$email=isset($_POST['email'])?$_POST['email']:NULL;
$page=isset($_GET['page'])?$_GET['page']:NULL;

if($text==NULL || $user==NULL || $email==NULL){
	
}else{
	date_default_timezone_set("Asia/Shanghai");
	$date = date('Y-m-d H:i:s');
	$sql="insert into taolun (user,text,email,time)value ('$user','$text','$email','$date')";
	$result=mysqli_query($link,$sql);
	echo '<meta http-equiv="Refresh" content="0;url=taolun.php">';
}
$size = 7;
if($page==NULL)$page=1;

$sql="select count(user) count from taolun";
$result=mysqli_query($link,$sql);

$qqq=mysqli_fetch_array($result);
//$qqq['count'] 这里是总数
$kaishi=($page-1)*$size;
$sumpage=ceil(($qqq['count']/$size));
// echo $qqq['count'].'<br>';
// echo $size;
// echo $sumpage;
$x=1;
$pagea='';
while ($x<=$sumpage) {
	//<li><a href="#">2</a></li>
	$pagea.='<li class="';
	if($x==$page){
		$pagea.='active';
	}
	$pagea.='"><a href="taolun.php?page='.$x.'">'.$x.'</a></li>';
	$x++;
}
$sql="select user,text,email,time from taolun order by tlid desc LIMIT $kaishi,$size";
$result=mysqli_query($link,$sql);
$x=1;
$html='';
while ($rows=mysqli_fetch_assoc($result)) {
	//alert alert-success,alert alert-info,alert alert-warning,alert alert-danger
	$html.='<div class="';
	if($x%4==1)$html.='alert alert-success';
    if($x%4==2)$html.='alert alert-info';
    if($x%4==3)$html.='alert alert-warning';
    if($x%4==0)$html.='alert alert-danger';
	$html.='"><div class="close" >&hearts;</div>';
	$html.='<h4>'.$rows['user'].' (Email:'.$rows['email'].' 发表于：'.$rows['time'].')'.'</h4>';
	$html.=$rows['text'].'</div>';
	++$x;
}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>讨论区_<?php echo $Kai_title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart_custom.css" rel="stylesheet" media="screen">
    </head>
    <body class="bootstrap-admin-with-small-navbar">
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top " role="navigation">
    <div class="container">
        <div class="row">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><?php echo $Kai_title; ?></a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li ><a href="index.php">答题首页</a></li>
              <li ><a href="stlb.php">试题列表</a></li>              
            </ul>
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="请输入内容">
              </div>
              <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
            <li ><a href="tables.php">排行榜</a></li>
              <li class="active"><a href="taolun.php">讨论</a></li>
              <li><a href="about.php">联系</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $dluser; ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">设置</a></li>
                  <li class="divider"></li>
                  <?php echo $deng; ?>
                </ul>
              </li>
      </ul>
      </div><!-- /.navbar-collapse -->
      </div>
      </div>
    </nav>
        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- left, vertical navbar -->
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="text-muted bootstrap-admin-box-title">留言区</div>
                            </div>

                            <div class="bootstrap-admin-panel-content">
					            <form method="post" action="taolun.php" >
                                	<textarea id="bootstrap-editor" class="form-control" placeholder="这里输入你的信息..." style="height: 200px " name="text"></textarea>
                                	<p></p>
                                	<div>
                                	<ul class="nav navbar-nav">
                                	
										<li ><input class="form-control" name="user" placeholder="昵称"  style="width: 553px"></li>
										<li>&nbsp;</li>
										<li ><input class="form-control" name="email" placeholder="邮箱"  style="width: 553px" type="email"></li>
										<li><button class="btn btn-default" type="submit">提交</button></li>
                                	</ul>
                                	</div>
									<p>&nbsp;</p>
								</form >
                            </div>
                            <div class="panel-heading">
                                <div class="text-muted bootstrap-admin-box-title">讨论区</div>
                            </div>
                            <div class="bootstrap-admin-panel-content">
                                <?php echo $html; ?>
                            </div>
                            <div class="pagination-container" align="center">
                                <ul class="pagination">
                                    <li><a href="taolun.php?page=1">&laquo;</a></li>
                                    <?php echo $pagea; ?>
                                    <li><a href="taolun.php?page=<?php echo $sumpage;  ?>">&raquo;</a></li>
                                </ul>
                            </div>
                    	</div>
                    </div>
            </div>
            <div class="row">
                <hr>

                <footer role="contentinfo">
                    <p>&copy; 2019 <a href="#" target="_blank"><?php echo $Kai_foot; ?></a></p>
                </footer>
            </div>
        </div>
        <script src="http://www.jq22.com/jquery/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script type="text/javascript">
            $(function() {
                $('.easyPieChart').easyPieChart({animate: 1000});
            });
        </script>
    </body>
</html>
