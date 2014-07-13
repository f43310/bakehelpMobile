<?php
	require_once("recipe.php");
	$r=new recipe;
	$r->__set("name",$_REQUEST["q"]);
	$rows=$r->querySameNameRows();
	if (!$rows) {
		echo "<font color=green>名称可用</font>";
	} else {
		echo "<font color=red>重名</font>";
	}
	

?>