<?php
	require_once("tjj.php");
	$t = new tjj;
	// echo $_REQUEST["tjjm"];
	// echo "<br />";
	// echo $_REQUEST["actperc"];
	// return;

	$t->__set("recipeId",$_REQUEST["id"]);
	$t->__set("name",$_REQUEST["name"]);
	$t->__set("tjjM",$_REQUEST["tjjm"]);
	$t->__set("actPerc",$_REQUEST["actperc"]);
	$t->__set("nowSum",$_REQUEST["nowsum"]);

	$t->addNew();
	$t=null;


?>