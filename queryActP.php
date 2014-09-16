<?php
	require_once("tjj.php");

	$t = new tjj;
	$t->__set("recipeId",$_REQUEST["id"]);
	$all_tjj = $t->query();
	$t=null;
	print("<table data-role='table' data-mode='reflow' class='table-stripe my-custom-breakpoint'>");
	print("<thead>");
	print("<tr><th>名称</th><th>实际比率</th></tr>");
	print("</thead>");
	print("<tbody>");
	foreach ($all_tjj as $item) {
		# code...	
		print("<tr>");	
		print("<td>$item->name</td><td>$item->actPerc</td>");
		print("</tr>");
	}
	print("</tbody>");
	print("</table>");
	


?>