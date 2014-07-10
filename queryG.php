<?php
	require_once("tspTog.php");
	$tsp=$_REQUEST["tsp"];
	if(!isset($tsp)){
		echo "参数错误";
	}
	$t=new tsptog;
	$t->__set(tsp,$tsp);
	$arr_tsptog=$t->query();
	$qStr="";
	$t=null;
	foreach ($arr_tsptog as $item) {
		$qStr .= "<p>$item->tsp = <a href='#none' class='copy'>$item->g</a></p>\n";
	}

	if($qStr==""){
		echo "no data";
	}else {
		echo $qStr;
	}
?>