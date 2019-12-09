<?php
require 'config.php';
$sql="select tmid,tmlb from tmlb";

$result=mysqli_query($link,$sql);
    $x=1;
    $html='';
    while ($rows=mysqli_fetch_assoc($result)) {
        if($x%2==1)$html.='<tr class="success">';
        if($x%2==2)$html.='<tr class="danger">';
        $html.='<td>'.$x.'</td>';
        $html.='<td>'.$rows['tmlb'].'</td>';
        $html.='<td>'.$rows['tmid'].'</td>';
        $sql="select count(testid) s from test where tmid=$rows[tmid]";
        $cccc=mysqli_query($link,$sql);
        $qqqq=mysqli_fetch_assoc($cccc);
        $html.='<td>'.$qqqq['s'].'</td>';
        $html.='<td>'.'<a href="Dati.php?tmid='.$rows['tmid'].'&user='.$cookie.'">开始答题</a>'.'</td></tr>';
        ++$x;
    };
 ?>
 
 <!DOCTYPE html>
<html>
    <head>
        <title>试题列表_<?php echo $Kai_title; ?></title>
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
              <li class="active"><a href="stlb.php">试题列表</a></li>              
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
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="text-muted bootstrap-admin-box-title">试题列表</div>
                            </div>
                            <div class="bootstrap-admin-panel-content">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>stlb</th>
                                            <th>count</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php echo $html; ?>
                                    </tbody>
                                </table>
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