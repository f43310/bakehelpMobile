<?php
	require_once("recipe.php");
	//
	function showReqDetail(){
		$reqSum=$_REQUEST["reqSum"];
		if ($reqSum==""){
			print("参数不正确");
			return;
		}
		$r=new recipe;
		$r->__set("id",$_REQUEST["id"]);
		$recipeName=$r->queryRI("name");

		print("<a href='index.php?action=deleteRR&id=".$_REQUEST["id"]."&reqsum=".$_REQUEST["reqSum"]."'>删除此产量配方</a>");
		$r=null;

		$ingre=new ingre;
		$ingre->__set("recipeId",$_REQUEST["id"]);
		$ingre->__set("requireSum",$reqSum);
		$allReqIngres=$ingre->queryReqIngres();
		$ingre=null;
		print("<table id=\"tab\" data-role=\"table\" data-mode=\"reflow\" class=\"ui-body-d table-stripe my-custom-breakpoint\">
				<thead>
					<tr>
						<th colspan='4'><h1>配方 $recipeName 产量 ".$_REQUEST["reqSum"]." - 副本</h1></th>
					</tr>
					<tr>
						<th>配料</th>
						<th>用量(g)</th>
						<th>百分比(%)</th>
						<th>M</th>
					</tr>
				</thead>
				<tbody>

				

			");
		$sum=0;
		$percentSum=0;
		$id = 1;
		foreach ($allReqIngres as $item) {
			print("<tr id='row".$id."'>
						<td>$item->name</td>
						<td>$item->metric</td>
						<td>$item->percent</td>
						<td class='ui-field-contain'><input type=\"checkbox\" data-enhanced='true' name='isMain".$id."' id='isMain".$id."' onclick='checkSet($item->id,this.id)' value=\"1\"></td>
					</tr>");
			$sum += (float)$item->metric;
			$percentSum = $item->perSum; 
			$remark=$item->remark;
			$id++;
		}
		print("<tr>
				<td></td>
				<td>$sum</td>
				<td>$percentSum</td>
				<td><input type=\"checkbox\" data-enhanced='true' name='sum2' id='sum2' onclick='checkSet2()' value=\"1\"></td>
			</tr>");
		print("<tr>
				<td colspan='4'>备注：$remark</td>
			</tr>");
		print("</tbody></table>");
		print("<table data-role='table' data-mode='reflow' class='ui-body-d table-stripe my-custom-breakpoint'>
				<thead><th>实际用量</th><th></th><th>主料量</th><th></th><th>实际烘焙比</th><th></th></thead>
				<tbody>
					<tr>
						<td class='ui-field-contain'><input type='text' name='actMetric' id='actMetric' data-inline='true'></td>
						<td class='ui-field-contain'><input type='radio' style='margin-top:5px;' name='checked' id='r1' onclick='checkedChange(1)' data-inline='true'></td>
						<td class='ui-field-contain'><input type='text' name='mainSum' id='mainSum' data-inline='true'></td>
						<td class='ui-field-contain'><input type='radio' style='margin-top:5px;' name='checked' id='r2' onclick='checkedChange(2)' data-inline='true'></td>
						<td class='ui-field-contain'><input type='text' name='actBakeP' id='actBakeP' data-inline='true'></td>
						<td class='ui-field-contain'>
							<input type='button' name='calActP' id='calActP' value='实际烘焙比' data-inline='true'>
						</td>
					</tr>
				</tbody>
			</table>");
		print("<div id='showTjj'></div>");
		print("<div data-role='fieldcontain'>
				<input type='hidden' name='recipeId' id='recipeId' value='".$_REQUEST["id"]."'>
				<input type='button' name='queryActP' id='queryActP' value='查看实际百分比'>
			</div>");
		
	}
?>