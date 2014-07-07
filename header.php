<!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<title>JqueryMobile tutorial</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.2.min.css">
	<link rel="stylesheet" href="css/my.css">
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

	/**/
	/* 复制提示 */
	.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -20px -80px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:6px;}
	.copy-tips-wrap{padding:10px 20px;text-align:center;border:1px solid #F4D9A6;background-color:#FFFDEE;font-size:14px;}
	</style>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.zclip.min.js"></script>
	<script src="js/jquery.mobile-1.4.2.min.js"></script>
	<script src="js/inputData.js"></script>
</head>
<body id="top">