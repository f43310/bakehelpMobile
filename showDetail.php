<?php
	// session_start();
	// showDetail()
	function showDetail(){
		require_once("recipe.php");
		print("<form data-ajax='false' method='post' action='index.php?action=saveSonR'>");
		$r=new recipe;
		if ($_REQUEST["id"] == ""){
			print("信息不完整!");
			return;
		}else{
			$r->__set("id",$_REQUEST["id"]);
			$recipeName=$r->queryRI("name");
			$instruc=$r->queryRI("instructions");
			$temperatureU=$r->queryRI("temperatureU");
			$temperatureD=$r->queryRI("temperatureD");
			$cooktime=$r->queryRI("cooktime");
			$recipeType=$r->queryRI("type");
			$r=null;

			// 显示配料详情
			$ingre=new ingre;
			$ingre->__set("recipeId", $_REQUEST["id"]);
			$all_ingres=$ingre->queryRID();
			$ingre=null;

		}

		if (isset($_SESSION["deleted"])) {
			if($_SESSION["deleted"]==1){
			print("<div class='red'>这是垃圾筒内的配方，删除后将无法恢复！</div>");
			print("<a href='index.php?action=deleteR&id=".$_REQUEST["id"]."'>删除此配方</a>");
			}
		} else {
			print("<a href='index.php?action=delR&id=".$_REQUEST["id"]."'>删除此配方</a>");
		}
		

		
		print("<table data-role='table' data-mode='reflow' class='ui-body-d table-stripe my-custom-breakpoint'>
			   <thead>
					<tr>
						<th colspan='4'>
						<div data-role='fieldcontain'>
							<label for='rName' class='ui-hidden-accessible'>配方:</label>
							<input type='text' name='rName' id='rName' value='".$recipeName."' data-inline='true'>
							<input type='submit' name='submit' id='submit5' value='改名' data-inline='true' data-mini='true'>
							<div id='mySpan'></div>
						</div>
						</th>
					</tr>
					<tr>
						<th>配料</th>
						<th>用量</th>
						<th>百分比</th>
                        <th></th>
					</tr>
			   </thead>
			   <tbody>");
		$i=1;
		$rowSum=0;
		foreach ($all_ingres as $item) {
				print("
				<tr id='".$i."'>
					<td class='ui-field-contain'><input type='text' name='ingre".$i."' id='ingre".$i."' value=\"$item->name\"><input type='hidden' name='ingreId".$i."' id='ingreId".$i."' value=\"$item->id\"></td>
					<td class='ui-field-contain'><input type='text' name='metric".$i."' id='metric".$i."'  value=\"$item->metric\"></td>
					<td class='ui-field-contain'><input type='text' name='percent".$i."' id='percent".$i."'  value=\"$item->percent\"></td>
					<td class='ui-field-contain'><a href=\"#\" data-role=\"button\" data-mini=\"true\" class=\"ui-btn ui-mini\" onclick=\"deltr($i)\">删</a></td>
				</tr>
				");
				$i++;
				$rowSum+=1;
				$sum=$item->sum;
				$percentSum=$item->perSum;
		}


		print("
			   </tbody>
			   </table>
			");

		print("<ul data-role='listview' data-inset='true'>
				<li class='ui-field-contain'>
					<label for='requireSum'>需求总量:&nbsp;&nbsp;&nbsp;<span id='hint' style='background:#FF0;font-weight:bold'></span></label>
					<input type='number' name='requireSum' id='requireSum'>
				</li>
				<li class='ui-field-contain'>
					<label for='remark'>备  注：</label>
					<input type='text' name='remark' id='remark'>
				</li>
				<li class='ui-field-contain'>
					<input type='hidden' name='recipeName' id='recipeName' value=\"$recipeName\">
					<input type='hidden' name='recipeId' id='recipeId' value='".$_REQUEST["id"]."'>

					<fieldset data-role='controlgroup' data-type='horizontal' data-mini='true'>
						<legend>计算保存:</legend>
						<input type='button' name='generateRecipe' id='generateRecipe' value='计算' data-inline='true'>
						<input type='submit' name='submit' id='saveSonRecipe' value='保存' data-inline='true' disabled=\"disabled\">
						<input type='button' name='rowNum' id='rowNum' value='".$rowSum."' data-inline='true'>
						<input type='hidden' name='rowNum' id='rowNumOld' value='".$rowSum."'>
						<input type='hidden' name='rowNumNew' id='rowNumNew' value='".$rowSum."'>

					</fieldset>

					
				</li>
				<li class='ui-field-contain'>
					<fieldset data-role=\"controlgroup\" data-type=\"horizontal\" data-mini='true'>
					<legend>修改配方:</legend>
					<input type=\"button\" name=\"add\" id=\"add\" value=\"增加一行\" data-inline=\"true\">
			");
					if ($recipeType == 2) {
						print("<input type=\"button\" name=\"reCalculateSpon\" id=\"reCalculateSpon\" value=\"RC2\" data-inline=\"true\">");
						print("<input type=\"button\" name=\"reCalculateSum\" id=\"reCalculateSum\" value=\"RC3\" data-inline=\"true\">");
						print("<input type=\"hidden\" name=\"recipeType\" id=\"recipeType\" value=\"2\">");
					} else if($recipeType == 3){
						print("<input type=\"button\" name=\"reCalculateSum\" id=\"reCalculateSum\" value=\"RC3\" data-inline=\"true\">");
						print("<input type=\"button\" name=\"reCalculate\" id=\"reCalculate\" value=\"RC1\" data-inline=\"true\">");
						print("<input type=\"hidden\" name=\"recipeType\" id=\"recipeType\" value=\"3\">");
					} else {
						print("<input type=\"button\" name=\"reCalculate\" id=\"reCalculate\" value=\"RC1\" data-inline=\"true\">");
						print("<input type=\"button\" name=\"reCalculateSum\" id=\"reCalculateSum\" value=\"RC3\" data-inline=\"true\">");
						print("<input type=\"hidden\" name=\"recipeType\" id=\"recipeType\" value=\"1\">");
					}
					
							
						print("<a href=\"#\" data-role=\"button\" onclick=\"clearPercentCol()\">clearP</a>
				</fieldset>
				</li>
				<li class='ui-field-contain'>
					<a href='index.php?action=showSonRecipes&id=".$_REQUEST["id"]."'>查看生成的子配方</a>
				</li>
				<li class='ui-field-contain'>
					<label for='sum'>总产量</label>
					<input type='text' name='sum' id='sum' value=\"$sum\">
				</li>
				<li class='ui-field-contain'>
					<label for='percentSum'>总百分比</label>
					<input type='text' name='percentSum' id='percentSum' value=\"$percentSum\">
				</li>
				<li class='ui-field-contain'>
					<label for='temperatureU'>上火</label>
					<input type='text' name='temperatureU' id='temperatureU' value=\"$temperatureU\">
				</li>
				<li class='ui-field-contain'>
					<label for='temperatureD'>下火</label>
					<input type='text' name='temperatureD' id='temperatureD' value=\"$temperatureD\">
				</li>
				<li class='ui-field-contain'>
					<label for='cooktime'>烘焙时间</label>
					<input type='text' name='cooktime' id='cooktime' value=\"$cooktime\">
				</li>
				<li class='ui-field-contain'>
					<label for='instruc'>制作说明:</label>
					<textarea cols='80' rows='8' name='instruc' id='instruc'>$instruc</textarea>
				</li>
				<li class='ui-field-contain'>
					<fieldset data-role='controlgroup' data-type='horizontal' data-mini='true'>
						<legend>更新保存:</legend>
						<input type='submit' name='submit' id='updateRecipe' value='更新配方' data-inline='true' onclick='return confirm(\"你确定要更新配方内容吗？如果是将删除所有过时的子配方.\");'>
						<input type='submit' name='submit' id='updataROther' value='更新其它' data-inline='true'>
						<input type='submit' name='submit' id='saveAsNewRecipe' value='另存为新配方' data-inline='true'>
						<input type='submit' name='submit' id='saveNewAddingre' value='保存新增加配料' data-inline='true'>
					</fieldset>
				</li>

			  </ul>
			");

		// 显示图像
		require_once("class_recimg.php");
		$img = new recimg;
		$img->__set("recipeId",$_REQUEST['id']);
		$arr_img = $img->query();
		$img=null;
		foreach ($arr_img as $item) {
			print "<a target='_blank' href='".$item->imgpath."'><img src='".$item->imgpath."'></a>\n";
		}

		print("</form>");
	}

	// saveSonR
	function saveSonR(){
	require_once("recipe.php");
		// print("<pre>");
		// var_dump($_REQUEST);
		// print("<pre>");
		// return;
		if($_REQUEST["submit"]=="改名"){
			$r=new recipe;
			$r->__set("id",$_REQUEST["recipeId"]);
			$r->__set("name",$_REQUEST["rName"]);
			$r->updateName();
			$r=null;

			$ingre=new ingre;
			$ingre->__set("recipeId",$_REQUEST["recipeId"]);
			$ingre->__set("recipeName",$_REQUEST["rName"]);
			$ingre->updateRecipeName();
			$ingre=null;
			print("<script>alert('配方 \"".$_REQUEST["rName"]."\" 改名 成功!');location.href='index.php?action=showDetail&id=".$_REQUEST["recipeId"]."';</script>");
		
		}else if($_REQUEST["submit"] == "更新其它"){
			$r=new recipe;
			$r->__set("id",$_REQUEST["recipeId"]);
			// $r->__set(name,$_REQUEST[rName]);
			$r->__set("instructions",$_REQUEST["instruc"]);
			$r->__set("temperatureU",$_REQUEST["temperatureU"]);
			$r->__set("temperatureD",$_REQUEST["temperatureD"]);
			$r->__set("cooktime",$_REQUEST["cooktime"]);
			$r->updateOther();
			$r=null;
			print("<script>alert('配方 \"".$_REQUEST["rName"]."\" 更新其它 成功!');location.href='index.php?action=showDetail&id=".$_REQUEST["recipeId"]."';</script>");

		}else if ($_REQUEST["submit"] == "更新配方"){
			$r=new recipe;
			$r->__set("id",$_REQUEST["recipeId"]);
			$r->__set("name",$_REQUEST["rName"]);
			$r->__set("instructions",$_REQUEST["instruc"]);
			$r->__set("temperatureU",$_REQUEST["temperatureU"]);
			$r->__set("temperatureD",$_REQUEST["temperatureD"]);
			$r->__set("cooktime",$_REQUEST["cooktime"]);
			$r->update();
			$r = null;

			$rowsNum=$_REQUEST["rowNum"];
			for ($i = 0; $i < $rowsNum; $i++) { 
				$ingre = new ingre;
				$ingre->__set("id",$_REQUEST["ingreId".($i+1)]);
				$ingre->__set("name",$_REQUEST["ingre".($i+1)]);
				$ingre->__set("recipeName",$_REQUEST["rName"]);
				$ingre->__set("metric",$_REQUEST["metric".($i+1)]);
				$ingre->__set("percent",$_REQUEST["percent".($i+1)]);
				$ingre->__set("sum",$_REQUEST["sum"]);
				$ingre->__set("perSum",$_REQUEST["percentSum"]);
				$ingre->update();
				$ingre = null;
			}

			// 更新原配方后删除所有子配方
			$ingre=new ingre;
			$ingre->__set("recipeId",$_REQUEST["recipeId"]);
			$ingre->delAllSonByRID();
			$ingre=null;
			// print("修改成功！<br />");
			// print("<a href='index.php'>查看结果</a>");
			// print("<a href='index.php?action=showDetail&id=".$_REQUEST[recipeId]."'>查看结果</a>");
			print("<script>alert('配方 \"".$_REQUEST["rName"]."\" 配方更新 成功!');location.href='index.php?action=showDetail&id=".$_REQUEST["recipeId"]."';</script>");

		}else if($_REQUEST["submit"]=="保存"){
			
			// 要插入ingres表的总行数等于($_REQUEST总数-多余的项)/3
			// $rowsNum = (count($_REQUEST) - SAVESONEXTRANUM)/3;
			$rowsNum=$_REQUEST["rowNum"];
			for($i=1;$i<=$rowsNum;$i++){
				$ingre=new ingre;
				$ingre->__set("name",$_REQUEST['ingre'.$i]);
				$ingre->__set("metric",$_REQUEST['metric'.$i]);
				$ingre->__set("percent",$_REQUEST['percent'.$i]);
				$ingre->__set("recipeId",$_REQUEST["recipeId"]);
				$ingre->__set("recipeName",$_REQUEST["recipeName"]);
				$ingre->__set("requireSum",$_REQUEST["requireSum"]);
				$ingre->__set("perSum",$_REQUEST["percentSum"]);
				$ingre->__set("remark",$_REQUEST["remark"]);
				$ingre->addreq();
				$ingre=null;
				

			}
			print("保存子配方成功！<br />");
			print("<a href='index.php?action=showSonRecipes&id=".$_REQUEST["recipeId"]."'>查看生成的子配方</a>");

		}else if($_REQUEST["submit"]=="保存为新配方"){
			// print("<pre>");
			// var_dump($_REQUEST);
			// print("</pre>");
			// return;
			// 插入 recipes表
			require_once("recipe.php");
			if ($_REQUEST["rName"]==""||
				$_REQUEST["sum"]==""||
				$_REQUEST["percentSum"]==""){
				print("<div class='prompt'>添加失败，请把信息填写完整</div>");
				print("<a href='javascript:history.go(-1)'>重试</a>");
			}
			else{
				$r=new recipe;
				$r->__set("name",$_REQUEST["rName"]);
				$r->__set("user_id",$_SESSION["user_id"]);
				$r->__set("instructions",$_REQUEST["instruc"]);
				$r->__set("temperatureU",$_REQUEST["temperatureU"]);
				$r->__set("temperatureD",$_REQUEST["temperatureD"]);
				$r->__set("cooktime",$_REQUEST["cooktime"]);
				$r->__set("type",$_REQUEST["recipeType"]);
				$r->add();
				// $r=null;
				// print("<script>alert('配方: ".$_REQUEST[rName]." 增加成功!');</script>");
			}
			// 插入 ingres 表
			// $r=new recipe;
			$r->__set("name",$_REQUEST["rName"]);
			// echo $r->__get(name);
			$id=$r->queryId();
			$r=null;
			// echo $id;
			// return;

			// 下面一行中的9在服务器上是10因为服务器多传了一个数据，这里是11因为比addRecipes.php多了3项
			// echo SAVEASEXTRANUM;
			// return;
			// $rowsNum = (count($_REQUEST)-SAVEASEXTRANUM)/3;			// 通过公式计算要插入数据库原料表中的个数, "4"代表其它和原料无关的元素 "3"代表配方表的三个属性 
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
			echo "<script>alert('配方: ".$_REQUEST["recipeName"]." 另存为 ".$_REQUEST["rName"]." 成功!');</script>";
			echo "<script>location.href='index.php';</script>";

		}
		else if ($_REQUEST["submit"] == "保存新增加配料") {
			$rowsNumOld = $_REQUEST["rowNum"];
			$rowsNumNew = $_REQUEST["rowNumNew"];

			$sum = $_REQUEST['sum'];
			$perSum = $_REQUEST['percentSum'];

			if ($rowsNumNew > $rowsNumOld) {
				# code...
				for ($i = 1; $i <= $rowsNumNew ; $i++) { 
					if ($i <= $rowsNumOld) {
						# code...
						$ingre = new ingre;
						$ingre->__set("id",$_REQUEST["ingreId".$i]);
						$ingre->__set('sum', $_REQUEST['sum']);
						$ingre->__set('perSum', $_REQUEST['percentSum']);
						$ingre->updateSum();
					} else {
						# code...
						$ingre = new ingre;			// 建立一个配方对象
						$ingre->__set('name',$_REQUEST['ingre'.$i]);
						$ingre->__set('metric',$_REQUEST['metric'.$i]);
						$ingre->__set('percent',$_REQUEST['percent'.$i]);
						$ingre->__set('recipeName',$_REQUEST['rName']);
						$ingre->__set('recipeId',$_REQUEST['recipeId']);
						$ingre->__set('sum',$_REQUEST['sum']);
						$ingre->__set('perSum',$_REQUEST['percentSum']);
						$ingre->add();
						$ingre=NULL;
					}
				}
			} else {
				echo "<script>alert('请确认你己经增加新配料!');</script>";
				echo "<script>location.href='index.php?action=showDetail&id=".$_REQUEST["recipeId"]."';</script>";
			}
			// 更新配方总量和总百分比

			print("<script>alert('配方 \"".$_REQUEST["rName"]."\" 配方新增项 成功!');location.href='index.php?action=showDetail&id=".$_REQUEST["recipeId"]."';</script>");
			
		}
		else {
			print("<script>location.href='index.php';</script>");
		}
	}


?>