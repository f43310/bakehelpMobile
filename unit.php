<?php
	require_once("class_unit.php");

	function addUnit($name,$otherUnit,$quantity,$gQuantity,$gPerOU){
		$unit = new unit;
		$unit->__set("name",$name);
		$unit->__set("otherUnit",$otherUnit);
		$unit->__set("quantity",$quantity);
		$unit->__set("gQuantity",$gQuantity);
		$unit->__set("gPerOU",$gPerOU);

		// print $unit->__get("name")."<br/>";
		// print $unit->__get("otherUnit")."<br/>";
		// print $unit->__get("quantity")."<br/>";
		// print $unit->__get("gQuantity")."<br/>";
		// print $unit->__get("gPerOU")."<br/>";

		$unit->addnew();
		$unit=null;
	}

	function updateUnit($id,$name,$otherUnit,$quantity,$gQuantity,$gPerOU){
		$unit = new unit;
		$unit->__set("id",$id);
		$unit->__set("name",$name);
		$unit->__set("otherUnit",$otherUnit);
		$unit->__set("quantity",$quantity);
		$unit->__set("gQuantity",$gQuantity);
		$unit->__set("gPerOU",$gPerOU);

		$unit->update();
		$unit=null;
	}

	function showUnits(){
		$unit = new unit;
		$arr_units = $unit->queryAll();
		$rowsNum = $unit->queryRowsNum();
		$unit=null;

		if ($rowsNum) {
			print "<a data-ajax='false' href='queryUnit.php?action=addUnit' id='addNewUnit'>增加新转换</a>";



			print "<ul data-role='listview' data-filter='true'>";
			foreach ($arr_units as $item) {
				print "<li><a rel='external' href='queryUnit.php?action=details&id=".$item->id."'>";
				print "Name:&nbsp;".$item->name;
				print $item->quantity;
				 print $item->otherUnit."<br/>";
				 print "克数:&nbsp;".$item->gQuantity."<br />";
				 print "密度:&nbsp;".$item->gPerOU."<br />";
				 print "</a><a rel='external' href='queryUnit.php?action=calculBH&id=".$item->id."'>变化计算</a></li>";
			}
			print "</ul>";
		}


		// 方案二
		// print "<form >";
		// print "<fieldset>";
		// print "<div data-role='fieldcontain'>";
		// print "<label for='name'>名称:</label>";
		// print "<input type='text' name='name' id='name' value='' />";
		// print "</div>";

		// print "<div data-role='fieldcontain'>";
		// print "<label for='otherUnit'>单位:</label>";
		// print "<input type='text' name='otherUnit' id='otherUnit' value='' />";
		// print "</div>";

		// print "<div data-role='fieldcontain'>";
		// print "<label for='quantity'>用量:</label>";
		// print "<input type='text' name='quantity' id='quantity' value='' />";
		// print "</div>";

		// print "</fieldset>";
		// print "</form>";
	}

	function showOneUnit($id){
		$name = "";
		$otherUnit = "";
		$quantity = "";
		$gQuantity = "";
		$gPerOU = "";

		if ($id != -1) {
			$unit = new unit;
			$unit->__set("id",$id);
			$oneUnit = $unit->query();
			$unit=null;

			$name = $oneUnit->name;
			$otherUnit = $oneUnit->otherUnit;
			$quantity = $oneUnit->quantity;
			$gQuantity = $oneUnit->gQuantity;
			$gPerOU = $oneUnit->gPerOU;
			print "<a rel='external' href='javascript:deleteEntry(".$id.")'>删除</a>";
		}

		print "<form method='post' rel='external' action='queryUnit.php' onsubmit='return checkForm();'>";
		print "<input type='hidden' name='id' id='id' value='".$id."'>";
		print "<input type='hidden' name='action' id='action' value='updateUnit'>";
		print "<fieldset>";

		print "<div data-role='fieldcontain'>";
		print "<label for='name'>名称:</label>";
		print "<input type='text' name='name' id='name' value='".$name."' />";
		print "</div>";

		print "<div data-role='fieldcontain'>";
		print "<label for='otherUnit'>单位:</label>";
		print "<input type='text' name='otherUnit' id='otherUnit' value='".$otherUnit."' />";
		print "</div>";

		print "<div data-role='fieldcontain'>";
		print "<label for='quantity'>用量:</label>";
		print "<input type='text' name='quantity' id='quantity' value='".$quantity."' />";
		print "</div>";

		print "<div data-role='fieldcontain'>";
		print "<label for='gQuantity'>克数:</label>";
		print "<input type='text' name='gQuantity' id='gQuantity' value='".$gQuantity."' />";
		print "</div>";

		print "<div data-role='fieldcontain'>";
		print "<label for='gPerOU'>比重:</label>";
		print "<input type='text' name='gPerOU' id='gPerOU' value='".$gPerOU."' />";
		print "</div>";

		print "</fieldset>";
		print "<button type='button' name='calcul' id='calcul' value='calcul' class='ui-btn ui-btn-inline ui-corner-all'>计算比重</button>";
		print "<button type='submit' value='save' class='ui-btn ui-btn-inline ui-corner-all'>Save Unit</button>";
		print "</form>";


	}

	function killUnit($id){
		$unit = new unit;
		$unit->__set("id",$id);
		$unit->delete();
		$unit=null;
	}

	function showCalForm($id){

			$unit = new unit;
			$unit->__set("id",$id);
			$oneUnit = $unit->query();
			$unit=null;

			$name = $oneUnit->name;
			$otherUnit = $oneUnit->otherUnit;
			$quantity = $oneUnit->quantity;
			$gQuantity = $oneUnit->gQuantity;
			$gPerOU = $oneUnit->gPerOU;

		print "<form method='post' rel='external' action='queryUnit.php' onsubmit='return checkForm();'>";
		print "<input type='hidden' name='id' id='id' value='-1'>";
		print "<input type='hidden' name='action' id='action' value='updateUnit'>";
		print "<fieldset>";

		print "<div data-role='fieldcontain'>";
		print "<label for='name'>名称:</label>";
		print "<input type='text' name='name' id='name' value='".$name."' />";
		print "</div>";

		print "<div data-role='fieldcontain'>";
		print "<label for='otherUnit'>单位:</label>";
		print "<input type='text' name='otherUnit' id='otherUnit' value='".$otherUnit."' />";
		print "</div>";

		print "<div data-role='fieldcontain'>";
		print "<label for='quantity'>用量:</label>";
		print "<input type='text' name='quantity' id='quantity' value='".$quantity."' />";
		print "</div>";

		print "<div data-role='fieldcontain'>";
		print "<label for='gQuantity'>克数:</label>";
		print "<input type='text' name='gQuantity' id='gQuantity' value='".$gQuantity."' />";
		print "</div>";

		print "<div data-role='fieldcontain'>";
		print "<label for='gPerOU'>比重:</label>";
		print "<input type='text' name='gPerOU' id='gPerOU' value='".$gPerOU."' />";
		print "</div>";

		// print "<div data-role='fieldcontain'>";
		// print "<label for='newQuantity'>变化量:</label>";
		// print "<input type='text' name='newQuantity' id='newQuantity' value='' />";
		// print "</div>";

		print "</fieldset>";
		print "<button type='button' name='calculBH' id='calculBH' value='calculBH' class='ui-btn ui-btn-inline ui-corner-all'>计算变化</button>";
		print "<button type='submit' value='save' class='ui-btn ui-btn-inline ui-corner-all'>Save Unit</button>";
		print "</form>";

	}
?>