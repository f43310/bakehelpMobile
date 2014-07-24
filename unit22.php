<?php
require_once("class_unit.php");
$unit=new unit;
$unit->__set("name","牛奶");
$unit->__set("otherUnit","cc");
$unit->__set("quantity",160);
$unit->__set("gQuantity",250);
$unit->__set("gPerOU",155);

		print $unit->__get("name")."<br/>";
		print $unit->__get("otherUnit")."<br/>";
		print $unit->__get("quantity")."<br/>";
		print $unit->__get("gQuantity")."<br/>";
		print $unit->__get("gPerOU")."<br/>";
$unit->addnew();
	
?>