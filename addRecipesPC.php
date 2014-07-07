<?
	function showAddForm($isSpon)
	{
		print("<form method=\"post\" action=\"index.php?action=upsert\">");
		print("<div data-role=\"fieldcontain\">");
		print("<label for=\"rName\" class=\"ui-hidden-accessible\">配方名称</label>");
		print("<input type=\"text\" name=\"rName\" id=\"rName\" placeholder=\"配方名称\" data-clear-btn=\"true\" required=\"required\">");
		print("<div id='mySpan' class='mySpan'></div>");
		print("</div>");

		print("
				<fieldset data-role='controlgroup' data-type='horizontal' data-mini='true' id='inputType'>
					<input type='radio' name='inputType' id='inputType1' value='基本' checked='checked'>
					<label for='inputType1'>基本</label>
					<input type='radio' name='inputType' id='inputType2' value='种面'>
					<label for='inputType2'>种面</label>
					<input type='radio' name='inputType' id='inputType3' value='百分比'>
					<label for='inputType3'>百分比</label>
				</fieldset>
			");
		print("<table id=\"tab\" data-role=\"table\" data-mode=\"reflow\" class=\"ui-body-d table-stripe my-custom-breakpoint\">");
		print("<thead>
					<tr>
						<th>原料</th>
						<th>用量(g)</th>
						<th colspan=\"2\">百分比(%)</th>
					</tr>
			   </thead>");
		print("<tbody>");
		print("<tr id=\"1\">
			<td><div data-role=\"fieldcontain\"><input type=\"text\" name=\"ingre1\" id=\"ingre1\" data-mini=\"true\"></div></td>
			<td>
				<div class='ui-grid-a ui-mini'>
				<div class='ui-block-a'><input type=\"text\" name=\"metric1\" id=\"metric1\"></div>
				<div class='ui-block-b'>
					<select name='selectUnit1' id='selectUnit1'>
					
					<optgroup label='公制'>
						<option value=\"1\">克</option>
						<option value=\"2\">千克</option>
					</optgroup>
					<optgroup label='市制'>
						<option value=\"3\">斤</option>
						<option value=\"4\">两</option>
						<option value=\"5\">钱</option>
					</optgroup>

					</select>
				</div>
			</div></td>
			<td><div data-role=\"fieldcontain\"><input type=\"number\" name=\"percent1\" id=\"percent1\" data-mini=\"true\" placeholder='此列自动生成'> </div></td>
			<td><a href=\"#\" data-role=\"button\" data-mini=\"true\" class=\"ui-btn ui-state-disabled ui-mini\">删</a></td></tr>");

		print("</tbody>");

		print("</table><br />");
		print("	<div data-role=\"controlgroup\" data-type=\"horizontal\" id='control1' data-mini='true'>
					<input type=\"button\" name=\"addW\" id=\"addW\" value=\"增加一行\" data-inline=\"true\">");
		// print("<input type=\"button\" name=\"calculateSpon\" id=\"calculateSpon\" value=\"计算2百分比\" data-inline=\"true\">");
			print("<input type=\"button\" name=\"calculate\" id=\"calculate\" value=\"计算百分比\" data-inline=\"true\">");

			print("	<a href=\"#\" data-role=\"button\" onclick=\"clearPercentCol()\" data-inline=\"true\">clearP</a>
				<input type='hidden' name='recipeType' id='recipeType' value='1'>
				</div>
					<ui data-role=\"listview\"  data-inset=\"true\">
						<li class=\"ui-field-contain\">
							<label for=\"instruc\">制作步骤:</label>
							<textarea name=\"instruc\" id=\"instruc\" cols=\"40\" rows=\"8\" data-mini=\"true\" data-inline=\"true\"></textarea>
						</li>
						<li class=\"ui-field-contain\">
							<label for=\"temperatureU\">烘烤温度(上火):</label>
							<input type=\"range\" name=\"temperatureU\" id=\"temperatureU\" value=\"100\" min=\"100\" max=\"300\">
						</li>
						<li class=\"ui-field-contain\">
							<label for=\"temperatureD\">烘烤温度(下火):</label>
							<input type=\"range\" name=\"temperatureD\" id=\"temperatureD\" value=\"100\" min=\"100\" max=\"300\">
						</li>
						<li class=\"ui-field-contain\">
							<label for=\"cooktime\">烤制时间:</label>
							<input type=\"range\" name=\"cooktime\" id=\"cooktime\" value=\"0\" min=\"0\" max=\"60\">
						</li>
					</ui>

				<input type=\"submit\" name=\"save\" id=\"save\" value=\"保  存\" data-mini=\"true\">
			   ");

		print("</form>");


	}

	function addRecipes()
	{
		// print("<pre>");
		// var_dump($_REQUEST);
		// print("</pre>");
		// return;
		// 插入 recipes表
		require_once("recipe.php");
		if ($_REQUEST[rName]==""||
			$_REQUEST[sum]==""||
			$_REQUEST[percentSum]==""){
			print("<div class='prompt'>添加失败，请把信息填写完整</div>");
			print("<a href='javascript:history.go(-1)'>重试</a>");
		}
		else{
			$r=new recipe;
			$r->__set(name,$_REQUEST[rName]);
			$r->__set(user_id,$_SESSION["user_id"]);
			$r->__set(instructions,$_REQUEST[instruc]);
			$r->__set(temperatureU,$_REQUEST[temperatureU]);
			$r->__set(temperatureD,$_REQUEST[temperatureD]);
			$r->__set(cooktime,$_REQUEST[cooktime]);
			$r->__set(type,$_REQUEST[recipeType]);
			$r->add();
			// print("<script>alert('配方: ".$_REQUEST[rName]." 增加成功!');</script>");
		}
		// 插入 ingres 表
		$r=new recipe;
		$r->__set(name,$_REQUEST[rName]);
		// echo $r->__get(name);
		$id=$r->queryId();
		$r=null;
		// echo $id;
		// return;

		// 下面一行中的9在服务器上是10因为服务器多传了一个数据
		// echo ADDEXTRANUM;
		// return;
		// $rowsNum = (count($_REQUEST)-ADDEXTRANUM)/3;			// 通过公式计算要插入数据库原料表中的个数, "4"代表其它和原料无关的元素 "3"代表配方表的三个属性 
		$rowsNum=$_REQUEST["rowNum"];

		for ($i =0; $i < $rowsNum; $i++){
			// echo $_POST['ingre'.($i+1)];
			$ingre = new ingre;			// 建立一个配方对象
			$ingre->__set('name',$_REQUEST['ingre'.($i+1)]);
			$ingre->__set('metric',$_REQUEST['metric'.($i+1)]);
			$ingre->__set('percent',$_REQUEST['percent'.($i+1)]);
			$ingre->__set('recipeName',$_REQUEST['rName']);
			$ingre->__set('recipeId',$id);
			$ingre->__set('sum',$_REQUEST['sum']);
			$ingre->__set('perSum',$_REQUEST['percentSum']);
			$ingre->add();
			$ingre=NULL;
			// echo "原料: ".$_REQUEST['ingre'.($i+1)]."  用量: ".$_REQUEST['metric'.($i+1)]."  百分比: ".$_REQUEST['percent'.($i+1)]." 添加成功！<br />";
		}

		// echo "总量: ".$_REQUEST['sum']." 百分比: ".$_REQUEST['percentSum']." 添加成功！<br />";
		echo "<script>alert('配方: \"".$_REQUEST[rName]."\" 增加成功!');location.href='index.php';</script>";

	}
?>