<?php
	require_once("class_unit.php");
	$quantity=$_REQUEST["num"];
	$otherUnit = $_REQUEST["unit"];
	// if($quantity==""){
	// 	$quantity="";
	// }else if($otherUnit==""){
	// 	$otherUnit="";
	// }
	$t=new unit;
	$t->__set("name",$_REQUEST["name"]);
	$t->__set("quantity",$quantity);
	$t->__set("otherUnit",$otherUnit);
	$arr_tsptog=$t->queryNow();
	$qStr="";
	$t=null;
	foreach ($arr_tsptog as $item) {
		$qStr .= "<p>$item->name".$item->quantity."$item->otherUnit = <a href='#none' class='copy'>$item->gQuantity</a></p>\n";
	}

	if($qStr==""){
		echo "no data";
	}else {
		echo $qStr;
	}
?>