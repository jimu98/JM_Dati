<?php 
$kai=isset($_POST['kai'])?$_POST['kai']:0;
$tmid=isset($_GET['tmid'])?$_GET['tmid']:0;
$user=isset($_GET['user'])?$_GET['user']:0;
// echo $tmid.$user;
// echo strlen('关于 OSPF 报文描述正确的是(多选)');//44个字符
require 'config.php';
if($kai==0){
	echo '<meta http-equiv="Refresh" content="0;url=index.php">';
}else{
$sql="select tmlb from tmlb where tmid=$tmid";
$result=mysqli_query($link,$sql);
$title=mysqli_fetch_array($result);

$sql="select testid,title,type,A,B,C,D,E,answer from test where tmid=$tmid order by type asc";
$result=mysqli_query($link,$sql);
while ($rows=mysqli_fetch_assoc($result)) {
	$bzda[$rows['testid']][0]=$rows['title'];//标题
	$bzda[$rows['testid']][1]=$rows['answer'];//标准答案
	// echo $bzda[$rows['testid']].'<br>';
}
$x=1;
$html='';
$zq=0;

foreach ($kai as $key =>  $value){
	$daan = implode("", $value);
	// echo $daan.'<br>';
	// echo $bzda[$key];
	if ($daan==$bzda[$key][1]) {
		$class1='btn btn-success';
		$class2='正确';
		$zq++;
	}else{$class1='btn btn-danger';$class2='错误';}
	$html.='<tr><td>'.$x.'</td><td>'.$bzda[$key][0].'</td><td>'.$bzda[$key][1].'</td><td>'.$daan.'</td><td><button class="'.$class1.'">'.$class2.'</button></td></tr>';
    ++$x;
}

$zql = sprintf("%.2f",$zq*100/($x-1));
//这里读取数据库里面的正确率取最大值
$sql="select zhun from user where user='$user'";
$result=mysqli_query($link,$sql);
$zhun1=mysqli_fetch_array($result);

if($zql>$zhun1['zhun']){

	$sql="update user set zhun=$zql where user='$user'";
	$result=mysqli_query($link,$sql);
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>成绩页面_<?php echo $Kai_title; ?></title>
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
              <li><a href="taolun.php">讨论</a></li>
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
                <div class="col-md-2 bootstrap-admin-col-left">
                     <ul class="nav navbar-collapse collapse bootstrap-admin-navbar-side">
                         <li class="active">
                            <a href="index.html"><i class="glyphicon glyphicon-chevron-right"></i> 首页</a>
                        </li>
						<li >
                            <a href="about.php"><i class="glyphicon glyphicon-chevron-right"></i> 关于我们</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
					<div class="row bootstrap-admin-no-edges-padding">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">考试信息</div>
                                </div>
                                <div class="bootstrap-admin-panel-content">
                                    <ul>
                                        <li>用 户 ：<?php echo $user; ?></li>
                                        <li>科 目：<?php echo $title['tmlb']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">成绩</div>
                                </div>
                                <div class="bootstrap-admin-panel-content">
                                    <ul>
                                        <li>分数：<?php echo $zq; ?></li>
                                        <li>总分：<?php echo $x-1; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row bootstrap-admin-no-edges-padding">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">正确率（写入数据库的为历史最高正确率）</div>
                                </div>
								<div class="bootstrap-admin-panel-content">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $zql;?>" aria-valuemin="0" aria-valuemax="<?php echo $zql;?>" style="width: <?php echo $zql;?>%"></div>
                                    </div>
	                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bootstrap-admin-no-edges-padding">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">错题</div>
                                </div>
								<div class="bootstrap-admin-panel-content">
	                                <table class="table">
	                                    <thead>
	                                        <tr>
	                                            <th>#</th>
	                                            <th>title</th>
	                                            <th>正确答案</th>
	                                            <th>你的答案</th>
	                                            <th>状态</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
		                                    <?php echo $html; ?>
	                                    </tbody>

	                                </table>
	                            </div>
                            </div>
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