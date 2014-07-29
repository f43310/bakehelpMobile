<?php
	require_once("recipe.php");
	$i=new ingre;
	$i->__set("requireSum",$_REQUEST["q"]);
	$i->__set("recipeId",$_REQUEST["id"]);
	$rows=$i->querySameRq();
	$i=null;
	if (!$rows) {
		echo "<font color=green>可用</font>";
	} else {
		echo "<font color=red>重复</font>";
	}
	

?>