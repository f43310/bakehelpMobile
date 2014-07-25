<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
	require("unit.php");
	require("queryUHeader.php");
?>
<div data-role="page">
	<div data-role="header">
		<a href="#" data-rel="back">返回</a>
		<h1>单位换算</h1>
		<a href="queryUnit.php">首页</a>
	</div>
	<div data-role="content">
		<?php
			$action=$_REQUEST["action"];
			if ($action=="addUnit") {
				showOneUnit(-1);
			}else if($action=="updateUnit"){
				// print "<pre>";
				// print_r($_REQUEST);
				// print "</pre>";
				if($_REQUEST["id"]=="-1"){
					// print("-1")."<br />";
					// print $_REQUEST["name"]." ".$_REQUEST["otherUnit"]." ".$_REQUEST["quantity"]." ".$_REQUEST["gQuantity"]." ".$_REQUEST["gPerOU"]."<br>";
					addUnit($_REQUEST["name"],$_REQUEST["otherUnit"],$_REQUEST["quantity"],$_REQUEST["gQuantity"],$_REQUEST["gPerOU"]);
				}else{
					// print("-2");
					updateUnit($_REQUEST["id"],$_REQUEST["name"],$_REQUEST["otherUnit"],$_REQUEST["quantity"],$_REQUEST["gQuantity"],$_REQUEST["gPerOU"]);
				}
				showUnits();
			}else if ($action=="details") {
				showOneUnit($_REQUEST["id"]);
			}else if ($action=="del") {
				killUnit($_REQUEST["id"]);
				showUnits();
			}else if($action=="calculBH"){
				showCalForm($_REQUEST["id"]);
			}else{
				showUnits();
			}
		?>
	</div>
	<div data-role="footer">
			<a href='index.php' data-role='button' data-ajax='false'>烘焙助手</a><h1>将其它单位换算成克</h1>
	</div>
</div>

	
</body>
</html>