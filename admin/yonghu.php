<?php 
require '../config.php';
if($dluser!='admin'){
    echo '<meta http-equiv="Refresh" content="0;url=../index.php">';
}
$xiugai='UID';
$xiu_user='';
$xiu_zhun='';
if(isset($_GET['xiugai'])){
    $xiugai=$_GET['xiugai'];
    $xiu_user=$_GET['user'];
    $xiu_zhun=$_GET['zhun'];
    $pass=isset($_GET['pass'])&&$_GET['pass']!=NULL?',pass=\''.md5($_GET['pass']).'\'':NULL;
    // echo $pass;
    $sql="UPDATE user SET user='$xiu_user',zhun=$xiu_zhun $pass WHERE uid ='$xiugai'";
    // echo $sql;
    mysqli_query($link,$sql);
}
if(isset($_GET['shanchu'])){
    $shanchu=$_GET['shanchu'];
    $sql="DELETE FROM user WHERE uid = '$shanchu'";
    mysqli_query($link,$sql);
    echo '<meta http-equiv="Refresh" content="0;url=yonghu.php">';//消除刷新的影响
}
if(isset($_GET['tianjia'])){
    echo $_GET['tianjia'];
    date_default_timezone_set("Asia/Shanghai");
    $date = date('Y-m-d H:i:s');
    $sql="insert into user (user,pass,time) value ('$_POST[user]',md5('$_POST[pass]'),'$date')";
    $result=mysqli_query($link,$sql);
    echo '<meta http-equiv="Refresh" content="0;url=yonghu.php">';
}

$sql="select uid,user,zhun from user order by zhun desc";

$result=mysqli_query($link,$sql);
    $x=1;
    $html='';
    while ($rows=mysqli_fetch_assoc($result)) {
        if($x%4==1)$html.='<tr class="success">';
        if($x%4==2)$html.='<tr class="warning">';
        if($x%4==3)$html.='<tr class="danger">';
        if($x%4==0)$html.='<tr class="active">';
        $html.='<td>'.$x.'</td>';
        $html.='<td>'.$rows['user'].'</td>';
        $html.='<td>'.$rows['zhun'].'</td>';
        $html.='<td>'.$rows['uid'].'</td>';
        $html.='<td><a href="yonghu.php?zhun='.$rows['zhun'].'&user='.$rows['user'].'&xiugai='.$rows['uid'].'"><button class="btn btn-primary"><i class="glyphicon glyphicon-pencil glyphicon-white"></i> Edit</button></a></td><td><a href="yonghu.php?shanchu='.$rows['uid'].'"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove glyphicon-white"></i> Delete</button></a></td></tr>';
        ++$x;
    };
$sql="select count(testid) from test";
$result=mysqli_query($link,$sql);
$qqq=mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>后台管理_<?php echo $Kai_title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
        <link href="../css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">
        <link href="../vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="../vendors/easypiechart/jquery.easy-pie-chart_custom.css" rel="stylesheet" media="screen">
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
              <li class="active"><a href="../index.php">答题首页</a></li>
              <li ><a href="../stlb.php">试题列表</a></li>              
            </ul>
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="请输入内容">
              </div>
              <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
            <li ><a href="../tables.php">排行榜</a></li>
              <li><a href="../taolun.php">讨论</a></li>
              <li><a href="../about.php">联系</a></li>
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
                         <li>
                            <a href="index.php"><i class="glyphicon glyphicon-chevron-right"></i> 首页</a>
                        </li>
                        <li class="active">
                            <a href="yonghu.php"><i class="glyphicon glyphicon-chevron-right"></i> 用户管理</a>
                        </li>
                        <li >
                            <a href="shiti.php"><i class="glyphicon glyphicon-chevron-right"></i> 试题管理</a>
                        </li>
                        <li >
                            <a href="taolun.php"><i class="glyphicon glyphicon-chevron-right"></i> 讨论区管理</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge pull-right"><?php echo $qqq[0]; ?></span> 试题数量</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">

                    <div class="row">
                        <div class="panel panel-default bootstrap-admin-no-table-panel">
                            <div class="panel-heading">
                                <div class="text-muted bootstrap-admin-box-title">增加用户</div>
                            </div>
                            <div class="bootstrap-admin-panel-content">
                            <form method="post" action="yonghu.php?tianjia=1" >
                                    <div>
                                    <ul class="nav navbar-nav">
                                        
                                        <li ><input class="form-control" name="user" placeholder="账号"  style="width: 300px"></li>
                                        <li>&nbsp;</li>
                                        <li ><input class="form-control" name="pass" placeholder="密码"  style="width: 300px" type="pass"></li>
                                        <li><button class="btn btn-default" type="submit">提交</button></li>
                                    </ul>
                                    </div>
                                    <p>&nbsp;</p>
                                </form>
                            </div>
                            <div class="panel-heading">
                                <div class="text-muted bootstrap-admin-box-title">修改用户</div>
                            </div>
                            <div class="bootstrap-admin-panel-content">
                            <form method="get" action="yonghu.php?xiugai=3" >
                                    <div>
                                    <ul class="nav navbar-nav">
                                        <li ><input class="form-control" readonly="readonly" name="xiugai" value="<?php echo $xiugai; ?>" style="width: 50px"></li>

                                        <li ><input class="form-control" name="user" placeholder="账号" value="<?php echo $xiu_user; ?>" style="width: 200px"></li>
                                        <li>&nbsp;</li>
                                        <li ><input class="form-control" name="pass" placeholder="密码(不填不修改)"  style="width: 200px" type="pass"></li>
                                        <li ><input class="form-control" name="zhun" placeholder="准确率" value="<?php echo $xiu_zhun; ?>" style="width: 200px" type="pass"></li>
                                        <li><button class="btn btn-default" type="submit">提交</button></li>
                                    </ul>
                                    </div>
                                    <p>&nbsp;</p>
                                </form>
                            </div>
                            <div class="panel-heading">
                                <div class="text-muted bootstrap-admin-box-title">用户管理</div>
                            </div>
                            <div class="bootstrap-admin-panel-content">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>准确率</th>
                                            <th>Uid</th>
                                            <th style="width:80px;">修改</th>
                                            <th style="width:80px;">删除</th>
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
            <div class="row">
                <hr>
                <footer role="contentinfo">
                    <p>&copy; 2019 <a href="#" target="_blank"><?php echo $Kai_foot; ?></a></p>
                </footer>
            </div>
        </div>
        <script src="http://www.jq22.com/jquery/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="../vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script type="text/javascript">
            $(function() {
                $('.easyPieChart').easyPieChart({animate: 1000});
            });
        </script>
    </body>
</html>