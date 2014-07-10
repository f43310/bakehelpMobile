<!doctype html>
<html lang='zh'>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.2.min.css">
	<script src="jquery-1.11.1.min.js"></script>
	<script src="jquery.zclip.min.js"></script>
	<script src="../js/jquery.mobile-1.4.2.min.js"></script>
	<script>
	$(function(){
		$(".copy-p").zclip({
		path: "ZeroClipboard.swf",
		copy:function(){
			return $(this).parent().find(".g").text();
		}
		});

		$(".copy").zclip({
		path: "ZeroClipboard.swf",
		copy:function(){
			return $(this).text();
		}
		});
	});
	
	</script>

</head>
<body>
	<div data-role='page'>
		<div data-role='header'></div>
		<div data-role='content'>
				<a href='#pop1' data-rel='popup' data-transition='pop' class='ui-btn ui-corner-all ui-shadow ui-btn-inline'>Basic Pop</a>
				<div data-role='popup' id='pop1'>
					<ul data-role='listview' data-inset='true'>
						<li data-role='fieldcontain'><p>泡打1/4勺=<span class='g'>2.5</span>g <a href='#none' class='copy-p'>复制</a></p></li>
						<li data-role='fieldcontain'><p>泡打1/4勺=<span class='g'>2.5</span>g <a href='#none' class='copy-p'>复制</a></p></li>
						<li data-role='fieldcontain'><p>泡打1/4勺=<span class='g'>2.5</span>g <a href='#none' class='copy-p'>复制</a></p></li>
						<li data-role='fieldcontain'><p>泡打1/4勺=<span class='g'>2.5</span>g <a href='#none' class='copy-p'>复制</a></p></li>
					</ul>

				</div>
				<div>
					<p><a href='#none' class='copy'>2.5</a></p>
					<p>泡打1/4勺=<span class='g'>2.5</span>g <a href='#none' class='copy-p'>复制</a></p>
				</div>
				

		</div>
		<div data-role='footer'></div>
	</div>
</body>
</html>