<?php
require 'config.php';
$sql="select uid,user,zhun from user order by zhun desc ";
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
        $html.='<td>'.$rows['uid'].'</td></tr>';
        ++$x;
    };
 ?>
 <!DOCTYPE html>
<html>
    <head>
        <title>排行榜_<?php echo $Kai_title; ?></title>
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
              <li class="active"><a href="about.php">联系</a></li>
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
                    <div class="row bootstrap-admin-no-edges-padding">

                        <div class="col-md-12">

                            <div class="panel panel-default">

                                <div class="panel-heading">

                                    <div class="text-muted bootstrap-admin-box-title">关于我们</div>

                                </div>
                                <div class="bootstrap-admin-panel-content">
                                    <li>前端样式代码基于<a href="https://github.com/VinceG/Bootstrap-Admin-Theme" target="_blank">Bootstrap-Admin-Theme</a>开发</li>
                                    <p></p>
                                    <li>php逻辑，数据库操作独立完成</li>
                                    <p></p>
                                    <li>指导老师：高璐</li>
                                    <p></p>
                                    <li>成员：张凯波，张凤龙，李泰</li>
                                    <p></p>
                                    <p>JM_Dati(积木答题系统) 是一个简单的在线答题，具有在线答题，在线判题等功能，可提供选择题，判断题，多选题等多种方式答题，并判题：</p>
                                    <p></p>
                                    <p>区分管理组与用户组，支持多试卷，并实施统计用户数量，试题数量，正确率，并生成对应排行榜，以及用户讨论区。超级管理员后台管理功能</p>
                                    <p></p>

                                    <p>用处：PHP期末大作业。</p>
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