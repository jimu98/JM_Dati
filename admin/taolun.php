<?php 
require '../config.php';
$xiugai='UID';
$xiu_user='';
$xiu_zhun='';
if($dluser!='admin'){
    echo '<meta http-equiv="Refresh" content="0;url=../index.php">';
}
if(isset($_GET['shanchu'])){
    $shanchu=$_GET['shanchu'];
    $sql="DELETE FROM taolun WHERE tlid = '$shanchu'";
    mysqli_query($link,$sql);
    echo '<meta http-equiv="Refresh" content="0;url=taolun.php">';
}

$sql="select tlid,user,text,email,time from taolun order by time desc";

$result=mysqli_query($link,$sql);
    $x=1;
    $html='';
    while ($rows=mysqli_fetch_assoc($result)) {
        if($x%4==1)$html.='<tr class="success">';
        if($x%4==2)$html.='<tr class="warning">';
        if($x%4==3)$html.='<tr class="danger">';
        if($x%4==0)$html.='<tr class="active">';
        $html.='<td>'.$x.'</td>';
        $html.='<td>'.$rows['text'].'</td>';
        $html.='<td>'.$rows['user'].'</td>';
        $html.='<td>'.$rows['email'].'</td>';
        $html.='<td>'.$rows['time'].'</td>';
        $html.='<td><a href="taolun.php?shanchu='.$rows['tlid'].'"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove glyphicon-white"></i> Delete</button></a></td></tr>';
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
                        <li >
                            <a href="yonghu.php"><i class="glyphicon glyphicon-chevron-right"></i> 用户管理</a>
                        </li>
                        <li >
                            <a href="shiti.php"><i class="glyphicon glyphicon-chevron-right"></i> 试题管理</a>
                        </li>
                        <li class="active">
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
                                <div class="text-muted bootstrap-admin-box-title">讨论管理</div>
                            </div>
                            <div class="bootstrap-admin-panel-content">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>text</th>
                                            <th>user</th>
                                            <th>email</th>
                                            <th>time</th>
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