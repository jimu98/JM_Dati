<?php 
$tmid=isset($_GET['tmid'])?$_GET['tmid']:0;
$user=isset($_GET['user'])?$_GET['user']:0;
if($user==NULL){
		echo '<meta http-equiv="Refresh" content="0;url=login.php">';
}
require 'config.php';
$sql="select tmid,tmlb,count from tmlb where tmid=$tmid";
$result=mysqli_query($link,$sql);

$sql="select count(tmid) count from test where tmid=$tmid";
$result=mysqli_query($link,$sql);
$qqq=mysqli_fetch_array($result);
$sql="select testid,title,type,A,B,C,D,E,answer from test where tmid=$tmid order by type asc";
$result=mysqli_query($link,$sql);
    $x=1;
    $html='';
    $list='';
    while ($rows=mysqli_fetch_assoc($result)) {
	    if($rows['type']==1)$type='radio';
	    if($rows['type']==2)$type='checkbox';
    	$list.='<li><a href="#kai_'.$x.'">'.$x.'</a></li>';
    	$html.='<li id="kai_'.$x.'"><div class="test_content_nr_tt"><i>'.$x.'</i><span>(1分)</span><font>'.$rows['title'].'</font><b class="icon iconfont">&#xe881;</b></div><div class="test_content_nr_main"><ul>';//前面的标签
    	
    	$html.='<li class="option"><input type="'.$type.'" class="radioOrCheck" name="'.'kai['.$rows['testid'].'][]'.'"id="bo_A_'.$x.'" value="A"/><label for="bo_A_'.$x.'">A.	<p class="ue" style="display: inline;">'.$rows['A'].'</p></label></li>';//A选项的标签
		$html.='<li class="option"><input type="'.$type.'" class="radioOrCheck" name="'.'kai['.$rows['testid'].'][]'.'"id="bo_B_'.$x.'" value="B"/><label for="bo_B_'.$x.'">B.	<p class="ue" style="display: inline;">'.$rows['B'].'</p></label></li>';//B选项的标签
    	// echo $html;
    	if($rows['C']!=''){
    		$html.='<li class="option"><input type="'.$type.'" class="radioOrCheck" name="'.'kai['.$rows['testid'].'][]'.'"id="bo_C_'.$x.'" value="C"/><label for="bo_C_'.$x.'">C.	<p class="ue" style="display: inline;">'.$rows['C'].'</p></label></li>';//C选项的标签
    	}
    	if($rows['D']!=''){
    		$html.='<li class="option"><input type="'.$type.'" class="radioOrCheck" name="'.'kai['.$rows['testid'].'][]'.'"id="bo_D_'.$x.'" value="D"/><label for="bo_D_'.$x.'">D.	<p class="ue" style="display: inline;">'.$rows['D'].'</p></label></li>';//C选项的标签
    	}
    	if($rows['E']!=''){
    		$html.='<li class="option"><input type="'.$type.'" class="radioOrCheck" name="'.'kai['.$rows['testid'].'][]'.'"id="bo_E_'.$x.'" value="E"/><label for="bo_E_'.$x.'">E.	<p class="ue" style="display: inline;">'.$rows['E'].'</p></label></li>';//C选项的标签
    	}
		$html.='</ul></div></li>';
        ++$x;
    };
 ?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>远程教育考试平台_在线考试</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/iconfont.css" rel="stylesheet" type="text/css" />
<link href="css/test.css" rel="stylesheet" type="text/css" />

<style>
.hasBeenAnswer {
	background: #5d9cec;
	color:#fff;
}
</style>
</head>

<body>
	<div class="main">
		<!--nr start-->
		<div class="test_main">
			<div class="nr_left">
				<div class="test">
					<form action="panti.php?tmid=<?php echo $tmid; ?>&user=<?php echo $user; ?>" method="post">

						<div class="test_title">
							<p class="test_time">
								<i class="icon iconfont">*</i><b class="alt-1">01:20</b>
							</p>
							<font><input type="submit" name="test_jiaojuan" value="交卷"></font>
						</div>
						
							<div class="test_content">
								<div class="test_content_title">
									<h2>开始答题</h2>
									<p>
										<span>共</span><i class="content_lit"><?php echo $qqq[0]; ?></i><span>题，</span><span>合计</span><i class="content_fs"><?php echo $qqq[0]; ?></i><span>分</span>
									</p>
								</div>
							</div>
							<div class="test_content_nr">
								<ul>
								<?php echo $html; ?>
									
								</ul>
							</div>
					</form>
				</div>
			</div>
			<div class="nr_right">
				<div class="nr_rt_main">
					<div class="rt_nr1">
						<div class="rt_nr1_title">
							<h1>
								<i class="icon iconfont">&#xe692;</i>答题卡
							</h1>
							<p class="test_time">
								<i class="icon iconfont">&#xe6fb;</i><b class="alt-1">01:20</b>
							</p>
						</div>
							<div class="rt_content">
								<div class="rt_content_tt">
									<h2>公告</h2>
								</div>
								<div class="rt_content_nr answerSheet">
									<ul>
										<p>这里写一段公告或者加个广告位</p>
									</ul>
								</div>
							</div>
							<div class="rt_content">
								<div class="rt_content_tt">
									<h2>考试信息</h2>

								</div>
								<div class="rt_content_nr answerSheet">
									<ul>
										<p>UID：<?php echo $user; ?></p>
									</ul>
								</div>
							</div>
							<div class="rt_content">
								<div class="rt_content_tt">
									<h2>全部题目</h2>
									<p>
										<span>共</span><i class="content_lit"><?php echo $qqq[0]; ?></i><span>题</span>
									</p>
								</div>
								<div class="rt_content_nr answerSheet">
									<ul><?php echo $list; ?>
									</ul>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<!--nr end-->
		<div class="foot"></div>
	</div>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery.easy-pie-chart.js"></script>
	<!--时间js-->
	<script src="js/jquery.countdown.js"></script>
	<script>
		window.jQuery(function($) {
			"use strict";
			
			$('time').countDown({
				with_separators : false
			});
			$('.alt-1').countDown({
				css_class : 'countdown-alt-1'
			});
			$('.alt-2').countDown({
				css_class : 'countdown-alt-2'
			});
		});
		$(function() {
			$('li.option label').click(function() {
			debugger;
				var examId = $(this).closest('.test_content_nr_main').closest('li').attr('id'); // 得到题目ID
				var cardLi = $('a[href=#' + examId + ']'); // 根据题目ID找到对应答题卡
				// 设置已答题
				if(!cardLi.hasClass('hasBeenAnswer')){
					cardLi.addClass('hasBeenAnswer');
				}
			});
		});
	</script>
<div style="text-align:center;">
</div>
</body>
</html>