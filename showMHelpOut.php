<!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<title>面包师助手帮助文档</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.2.min.css">
	<style type="text/css">
		img {
			max-width: 100%;
			display: block;
			clear:both;
		}
		a[name] {
			display: block;
			font-size: 30px;
			margin: 10px 10px;
            font-family:"微软雅黑";
            color:#49B23E;
		}


	a{
		color: #333;
		text-decoration: none;
	}
	a:hover{
		color: #548B02;
	}
	p{
		margin-bottom:10px;
	}
	#back-to-top{
		position:fixed;
		bottom:10px;
		left:80%;
	}
	#back-to-top a{
		text-align:center;
		text-decoration:none;
		color:#d1d1d1;
		display:block;
		width:80px;
		/*使用CSS3中的transition属性给跳转链接中的文字添加渐变效果*/
		-moz-transition:color 1s; 
		-webkit-transition:color 1s;
		-o-transition:color 1s;
	}
	#back-to-top a:hover{
		color:#979797;
	}
	#back-to-top a span{
		background:#d1d1d1;
		border-radius:6px;
		display:block;
		height:40px;
		width:40px;
		background:#d1d1d1 url(images/arrow-up.png) no-repeat center center;
		margin-bottom:5px;
		-moz-transition:background 1s;
		-webkit-transition:background 1s;
		-o-transition:background 1s;
	}
	#back-to-top a:hover span{
		background:#979797 url(images/arrow-up.png) no-repeat center center;
	}
	</style>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.mobile-1.4.2.min.js"></script>
	<script type="text/javascript">
	// TOP 浮动

	   $(function(){
	   //首先将#back-to-top隐藏
	   $("#back-to-top").hide();
	   //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
	   $(function () {
	      $(window).scroll(function(){
	      if ($(window).scrollTop()>100){
	      $("#back-to-top").fadeIn(1500);
	      }
	      else
	      {
	      $("#back-to-top").fadeOut(1500);
	      }
	      });
	      //当点击跳转链接后，回到页面顶部位置
	      $("#back-to-top").click(function(){
	      $('body,html').animate({scrollTop:0},1000);
	      return false;
	      });
	      });
	      });
	</script>
</head>
<body id='top'>
	<div data-role='page'>
		<div data-role='header'><h1>面包师助手</h1><a href='index.php' data-role='button' class='ui-btn-right'>进入应用</a></div>
		<div data-role='content'>
			<?php 
				require_once("mobileHelp.php");
				showHelp();

			?>

		</div>
		<div data-role='footer'><h1>面包师助手帮助</h1></div>
	</div>

</body>
</html>