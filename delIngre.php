<?php
	require_once("recipe.php");

	$id = $_REQUEST["id"];
	$recid = $_REQUEST["recid"];
	$ing = new ingre;
	$ing->__set("id", $id);
	$ing->delOne();
	$ing = null;
	// 更新总和总百分比
	$ing = new ingre;
	$ing->__set("recipeId", $recid);
	$ing->updateSumPSum();
	$ing=null;

	// 查询总和总百分比
	$ing = new ingre;
	$ing->__set("recipeId", $recid);
	$sum = $ing->querySum()->sum;
	$percentSum = $ing->querySum()->perSum;
	$ing = null;

	echo $sum."-".$percentSum;

	

?>