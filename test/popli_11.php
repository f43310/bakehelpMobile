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
						<a href='#addActualPercent' data-rel='popup' data-position-to='window' class='ui-btn ui-corner-all ui-shadow ui-btn-inline' data-transition='pop'>AAP</a>
						<div data-role='popup' id='addActualPercent'>
							<form>
								<div style='padding:10px 20px;'>
									<h3>增加添加剂:</h3>
									<label for='ingreName'>添加剂</label>
									<input type='text' name='ingreName' id='ingreName' value='' />
									<label for='actPerc'>实际百分比</label>
									<input type='text' name='actPerc' id='actPerc' value='' />
									<label for='nowSum'>现总量</label>
									<input type='text' name='nowSum' id='nowSum' value='".$sum."' />
									<button type='submit' class='ui-btn ui-corner-all ui-shadow'>保存</button>
								</div>
							</form>
						</div>
		</div>
		<div data-role='footer'></div>
	</div>
</body>
</html>