<?php 
require 'config.php';
$sql="select count(uid) from user";
$result=mysqli_query($link,$sql);
$count=mysqli_fetch_array($result);
$sql="select uid,user,time from user order by uid desc limit 0,3";
$result=mysqli_query($link,$sql);
$user1=mysqli_fetch_array($result);
$user2=mysqli_fetch_assoc($result);
$user3=mysqli_fetch_assoc($result);
$sql="select uid,user,zhun from user order by zhun desc limit 0,3";
$result=mysqli_query($link,$sql);
$zhun1=mysqli_fetch_array($result);
$zhun2=mysqli_fetch_assoc($result);
$zhun3=mysqli_fetch_assoc($result);
$sql="select count(testid) from test";
$result=mysqli_query($link,$sql);
$qqq=mysqli_fetch_array($result);
$sql="select count(testid) from test";
$result=mysqli_query($link,$sql);
$ppp=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>首页_<?php echo $Kai_title; ?></title>
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
              <li class="active"><a href="#">答题首页</a></li>
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
                        <li>
                            <a href="stlb.php"><span class="badge pull-right"><?php echo $qqq[0]; ?></span> 试题数量</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="alert alert-success">
<!-- alert alert-danger -->
                            <a class="close" data-dismiss="alert" href="#">&times;</a>
                            <h4>通知信息</h4>
                            <?php echo $Kai_gonggao; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-default bootstrap-admin-no-table-panel">
                            <div class="panel-heading">
                                <div class="text-muted bootstrap-admin-box-title">统计</div>
<!--                                 <div class="pull-right"><span class="badge">查看更多</span></div> -->
                            </div>
                            <div class="bootstrap-admin-panel-content bootstrap-admin-no-table-panel-content collapse in">
                                <div class="col-md-3">
                                    <div class="easyPieChart" data-percent="<?php echo $count[0]; ?>" style="width: 110px; height: 110px; line-height: 110px;"><?php echo $count[0]; ?><canvas width="110" height="110"></canvas></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">用户</span></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="easyPieChart" data-percent="85" style="width: 110px; height: 110px; line-height: 110px;"><?php echo $qqq[0]; ?><canvas width="110" height="110"></canvas></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">题目</span></div>
                                </div>
                                <div class="col-md-3">

                                    <div class="easyPieChart" data-percent="<?php echo $zhun1['zhun']; ?>" style="width: 110px; height: 110px; line-height: 110px;"><?php echo $zhun1['zhun']; ?>%<canvas width="110" height="110"></canvas></div>

                                    <div class="chart-bottom-heading"><span class="label label-info">最高正确率</span></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="easyPieChart" data-percent="<?php echo $qqq[0]; ?>" style="width: 110px; height: 110px; line-height: 110px;"><?php echo $qqq[0]; ?>%<canvas width="110" height="110"></canvas></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">留言人数</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row bootstrap-admin-no-edges-padding">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">准确率排名</div>
                                    <div class="pull-right"><span class="badge">Top</span></div>
                                </div>
                                <div class="bootstrap-admin-panel-content">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>accuracy</th>
                                                <th>Uid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><?php echo $zhun1['user']; ?></td>
                                                <td><?php echo $zhun1['zhun']; ?>%</td>
                                                <td><?php echo $zhun1['uid']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><?php echo $zhun2['user']; ?></td>
                                                <td><?php echo $zhun2['zhun']; ?>%</td>
                                                <td><?php echo $zhun2['uid']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><?php echo $zhun3['user']; ?></td>
                                                <td><?php echo $zhun3['zhun']; ?>%</td>
                                                <td><?php echo $zhun3['uid']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">最新注册</div>
                                    <div class="pull-right"><span class="badge"><?php echo $count[0]; ?></span></div>
                                </div>
                                <div class="bootstrap-admin-panel-content">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Time</th>
                                                <th>uid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><?php echo $user1['user']; ?></td>
                                                <td><?php echo $user1['time']; ?></td>
                                                <td><?php echo $user1['uid']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><?php echo $user2['user']; ?></td>
                                                <td><?php echo $user2['time']; ?></td>
                                                <td><?php echo $user2['uid']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><?php echo $user3['user']; ?></td>
                                                <td><?php echo $user3['time']; ?></td>
                                                <td><?php echo $user3['uid']; ?></td>
                                            </tr>
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