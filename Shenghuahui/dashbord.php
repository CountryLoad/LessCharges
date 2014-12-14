<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<!-- 右上角，加入登录，提醒按钮 -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">省话惠</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">省话惠</a></li>
            <li><a href="signin.html">登录</a></li>
            <li><a href="#">反馈</a></li>           
          </ul>
          <!-- 搜索 -->
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
	<!-- 左侧已经修改 -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php
          		require_once ('public_function/api_phoneinfo.php');
          		$name = 'hello';
          							$data = 300;
          							$call = 200;
          							$text = 100;
          		$phonenumber = '15663403081';
//           		$phonenumber = $_POST ['phonenumber'];
          		$phone_info = phoneinfo($phonenumber);
//           		$data = $_POST ['data'];
//           		$call = $_POST ['call'];
//           		$text = $_POST ['message'];

				echo <<<HTML
		  <ul class="nav nav-sidebar">		
			<li class="active" style ="text-align:center"><a href="#">个人信息<span class="sr-only">(current)</span></a></li>
            <li style ="text-align:center"><img src="img/userImg.png"/><span style="font-size:36px;">&nbsp;</span>15663403081<li>
            <li><font color="#4e72b8" size="3.5px">归属地:</font><div style="text-align:center;color:#f58220">$phone_info[1]</divv></li>
            <li><font color="#4e72b8" size="3.5px">运营商:</font><nav style="text-align:center;color:#f58220">$phone_info[0]</nav></li>
            <li><font color="#4e72b8" size="3.5px">套餐类别:</font><nav style="text-align:center;color:#f58220">暂无</nav></li>
			<li><font color="#4e72b8" size="3.5px">是否漫游:</font><nav style="text-align:center;color:#f58220">$phone_info[2]</nav></li>     
		  </ul>
		  <ul class="nav nav-sidebar">
            <li class="active" style ="text-align:center"><a href="#">套餐需求 <span class="sr-only">(current)</span></a></li>
            <li><img src="img/yuyin.png"/><span style="font-size:36px;">&nbsp;&nbsp;&nbsp;</span>$call 分钟<li>
			<li><img src="img/liuliang.png"/><span style="font-size:36px;">&nbsp;&nbsp;&nbsp;</span>$data M<li>
			<li><img src="img/dx.png"/><span style="font-size:36px;">&nbsp;&nbsp;&nbsp;</span>$text 条<li>
          </ul>
HTML;
          ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header" align ="center">最省钱的手机套餐</h1>
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/300x300/auto/sky/text:中国移动" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4><input type="button" value = "中国移动" onclick="get();"/></h4>
              <span class="text-muted" >Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/300x300/auto/#ef4136:#FFFFFF/text:中国联通" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/300x300/auto/vine/text:中国电信" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            
          </div>

          <h2 class="sub-header">套餐详情</h2>
          <div class="table-responsive">
            <?php
	require_once ('public_function/extract_packages/cu_34g.php');
	require_once ('public_class/class_pkg.php');
	require_once ("public_function/pkg/read_pkg.php");
	require_once ('public_function/simple_html_dom.php');
	require_once ('public_function/analysis/cal_pkg.php');

	$data = 300;
	$call = 200;
	$text = 100;
	$pkg[0] = cal_cu_national($call, $data, $text);
	$pkg[1] = cal_cu_local($call, $data, $text);
	$pkg[2] = cal_cu_stu($call, $data, $text);
// 	var_dump($pkg[0]);
// 	echo 'hello';
	//get iphone_packages
// 	$pkg = extract_iphone();
	echo <<<HTML
	<table class="table table-striped">
	<thead>
	<tr>
	<th>套餐名称</th>
	<th>价格</th>
	<th>包含电话</th>
	<th>包含流量</th>
	<th>包含短信</th>
	<th>套餐外电话</th>
	<th>套餐外流量</th>
	<th>套餐外短信</th>
	<th>总价格</th>
	</tr>
	</thead>
	<tbody>
HTML;
	foreach ($pkg as $p){
		echo '<tr>';
		echo '<td>'.$p->id.'</td>';
		echo '<td>'.$p->cost.'</td>';
		echo '<td>'.$p->pkg_call.'</td>';
		echo '<td>'.$p->pkg_data.'</td>';
		echo '<td>'.$p->pkg_text.'</td>';
		echo '<td>'.$p->over_call.'</td>';
		echo '<td>'.$p->over_data.'</td>';
		echo '<td>'.$p->over_text.'</td>';
		echo '<td>'.$p->full_cost.'</td>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
?>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
