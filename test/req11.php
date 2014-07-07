<!doctype html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.2.min.css">
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/jquery.mobile-1.4.2.min.js"></script>
</head>
<body>
	<div data-role='page'>
		<div data-role='header'></div>
		<div data-role='content'>
			<div class='ui-grid-a'>
				<div class='ui-block-a'><input type="text" name="metric1" id="metric1" value=''></div>
				<div class='ui-block-b'>
					<select name='selectUnit1' id='selectUnit1'>
					
					<optgroup label='公制'>
						<option value='1'>克</option>
						<option value='2'>千克</option>
					</optgroup>
					<optgroup label='市制'>
						<option value='3'>斤</option>
						<option value='4'>两</option>
						<option value='5'>钱</option>
					</optgroup>

					</select>
				</div>
			</div>
				
				

		</div>
		<div data-role='footer'></div>
	</div>
</body>
</html>