<?php
	function showAddForm()
	{
		print("<form data-ajax='false' enctype='multipart/form-data' method=\"post\" action=\"index.php?action=upsert\">");
		print "<div data-role='fieldset'>";
		print("<div data-role=\"fieldcontain\">");
		print("<label for=\"rName\" class=\"ui-hidden-accessible\">配方名称</label>");
		print("<input type=\"text\" name=\"rName\" id=\"rName\" placeholder=\"配方名称\" data-clear-btn=\"true\" required=\"required\">");
		print("<div id='mySpan' class='mySpan'></div>");
		print("</div>");

		print("
				<fieldset data-role='controlgroup' data-type='horizontal' data-mini='true' id='inputType'>
					<legend>请选择录入类型:</legend>
					<input type='radio' name='inputType' id='inputType1' value='基本' checked='checked'>
					<label for='inputType1'>基本</label>
					<input type='radio' name='inputType' id='inputType2' value='种面'>
					<label for='inputType2'>种面</label>
					<input type='radio' name='inputType' id='inputType3' value='百分比'>
					<label for='inputType3'>百分比</label>
				</fieldset>
			");
		print("
				<div data-role='fieldcontain'>
						<input type=\"number\" name=\"otherUnit\" id=\"otherUnit\" data-role='none'>
						<select name='selectUnit' id='selectUnit' data-role='none'>
						<option>单位</option>
						<optgroup label='公制'>
							<option value=\"1\">千克</option>
						</optgroup>
						<optgroup label='市制'>
							<option value=\"2\">斤</option>
							<option value=\"3\">两</option>
							<option value=\"4\">钱</option>
						</optgroup>
						<optgroup label='其它'>
							<option value=\"5\">蛋</option>
						</optgroup>
						</select>
						<input type=\"number\" name='gUnit' id='gUnit' data-role='none'/>
						<input type=\"button\" name='zCopy' id='zCopy' value='复制'  data-role='none'/>

						<a href='#pop1' data-rel='popup' data-transition='pop' class='ui-btn ui-corner-all ui-shadow ui-btn-inline ui-mini'>Qyery g</a>
						<div data-role='popup' id='pop1'>
							<ul data-role='listview' data-inset='true'>
								<li data-role='fieldcontain'><input type=\"text\" name='queryG' id='queryG' value='' data-mini='true'/></li>
								<li data-role='fieldcontain' id='queryGResult'></li>
							</ul>
						</div>
				</div>");
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
			<td><div data-role=\"fieldcontain\"><input type=\"number\" name=\"metric1\" id=\"metric1\" data-mini=\"true\"></div></td>
			<td><div data-role=\"fieldcontain\"><input type=\"number\" name=\"percent1\" id=\"percent1\" data-mini=\"true\" placeholder='此列自动生成'> </div></td>
			<td><a href=\"#\" onclick=\"deltr(1)\" data-role=\"button\" data-mini=\"true\" class=\"ui-btn ui-mini\">删</a></td></tr>");

		print("</tbody>");

		print("</table><br />");
		print("	<div data-role=\"controlgroup\" data-type=\"horizontal\" id='control1' data-mini='true'>
					<input type=\"button\" name=\"add\" id=\"add\" value=\"增加一行\" data-inline=\"true\">");
		// print("<input type=\"button\" name=\"calculateSpon\" id=\"calculateSpon\" value=\"计算2百分比\" data-inline=\"true\">");
			print("<input type=\"button\" name=\"calculate\" id=\"calculate\" value=\"计算百分比\" data-inline=\"true\">");

			print("	<a href=\"#\" data-role=\"button\" onclick=\"clearPercentCol()\" data-inline=\"true\">clearP</a>
				<input type='hidden' name='recipeType' id='recipeType' value='1'>
			   </div>");

			/*上传图片 -- Begin */
			print "<div id='upload'>";
			print "<input type='hidden' name='MAX_FILE_SIZE' value='500000'/>";
			print "<button type='button' id='addUp' name='addUp' data-inline='true'>增加上传图片</button>";
			// print "<div data-role='fieldcontain'>";
			// print "<label for='recipe_image[]'>选择图片:&nbsp;&nbsp;<a href='#' id='rmlink'>X</a></label>";
			// print "<input type='file' name='recipe_image[]'>";
			print "</div>";
			
			// print "<button type='button' id='delUp' name='delUp' data-inline='true'>删除</button>";
			// print "</div>";

			/*上传图片 --End */

			print ("<ui data-role=\"listview\"  data-inset=\"true\">
						<li class=\"ui-field-contain\">
							<label for=\"instruc\">制作步骤:</label>
							<textarea name=\"instruc\" id=\"instruc\" cols=\"40\" rows=\"8\" data-mini=\"true\" data-inline=\"true\"></textarea>
						</li>
						<li class=\"ui-field-contain\">
							<label for=\"temperatureU\">烘烤温度(上火):</label>
							<input type=\"range\" name=\"temperatureU\" id=\"temperatureU\" value=\"100\" min=\"100\" max=\"300\" data-highlight='true'>
						</li>
						<li class=\"ui-field-contain\">
							<label for=\"temperatureD\">烘烤温度(下火):</label>
							<input type=\"range\" name=\"temperatureD\" id=\"temperatureD\" value=\"100\" min=\"100\" max=\"300\" data-highlight='true'>
						</li>
						<li class=\"ui-field-contain\">
							<label for=\"cooktime\">烤制时间:</label>
							<input type=\"range\" name=\"cooktime\" id=\"cooktime\" value=\"0\" min=\"0\" max=\"60\" data-highlight='true'>
						</li>
					</ui>

				<input type=\"submit\" name=\"save\" id=\"save\" value=\"保  存\" data-mini=\"true\">
			   ");
		// print "</div>";
		print("</form>");


	}
	// 外国人写的转换$_FILES[] 数组结构的函数
	function reArrayFiles(&$file_post) {

	    $file_ary = array();
	    $file_count = count($file_post['name']);
	    $file_keys = array_keys($file_post);

	    for ($i=0; $i<$file_count; $i++) {
	        foreach ($file_keys as $key) {
	            $file_ary[$i][$key] = $file_post[$key][$i];
	        }
	    }

	    return $file_ary;
	}


	function addRecipes()
	{
		// print("<pre>");
		// var_dump($_REQUEST);
		// print("</pre>");
		// return;
		// var_dump(iconv_get_encoding('all'));
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
			// print("<script>alert('配方1: ".$_REQUEST[rName]." 增加成功!');</script>");
		}
		// 插入 ingres 表
		$r=new recipe;
		$r->__set(name,$_REQUEST[rName]);
		// echo $r->__get(name);
		$id=$r->queryId();
		$r=null;


		/*上传图片配置 --Begin*/
		$max_photo_size = 500000;	// 请求上传不能超过500kB
		$upload_required = true;

		$upload_page = "index.php?action=addNew";
		$upload_dir = "fileupl/";

		/*上传图片配置 --End*/

		/* 上传程序 --Begin*/
		// 文件域是否存在
		// print("<pre>");
		// print_r($_FILES['recipe_image']);
		// print("</pre>");
		// return;
	do{


		if (!isset($_FILES['recipe_image'])){
			
			print "This form was not sent in completely.";
			break;
		}else{
			$file_ary =reArrayFiles($_FILES['recipe_image']);
			foreach ($file_ary as $file) {
				# code...
				$err_msg = false;
				do{
					/*检查我们能够获取的所有可能出现的错误号*/
					switch ($file['error']) {
						case UPLOAD_ERR_INI_SIZE:
								$err_msg = 'The size of the image is too large, '.
								"it can not be more than $max_photo_size bytes.";
							break 2;

						case UPLOAD_ERR_PARTIAL:
							$err_msg = 'An error ocurred while uploading the file, '.
								"please <a href='{$upload_page}'>try again</a>.";
							break 2;

						case UPLOAD_ERR_NO_FILE:
							if($upload_required){
								$err_msg = 'You did not select a file to be upload, '.
								"please do so <a href='{$upload_page}'>here</a>.";
								break 2;
							}
							break 2;
							

						case UPLOAD_ERR_FORM_SIZE:
								$err_msg = 'The size was too large according to '.
									"the MAX_FILE_SIZE hidden field in the upload form.";
								case UPLOAD_ERR_OK:
								if ($file['size'] > $max_photo_size) {
									$err_msg = 'The size of the image is too large.'.
										"it can not be more than $max_photo_size bytes.";
								}
							break 2;
						
						default:
							$err_msg = 'An unknown error occurred, '.
								"please try again <a href='{$upload_page}'>here</a>.";
					}

					/*注意检查mime 类型是否正确.我们允许jpg,gif,png*/
					if(!in_array($file['type'], array('image/jpeg','image/pjpeg','image/png','image/gif'))){
						$err_msg = 'You need to upload a PNG or JPEG image, '.
						"please do so <a href='{$upload_page}'>here</a>.";
						break;
					}
				} while(0);

				if (!$err_msg) {
					if(!@move_uploaded_file($file['tmp_name'], $upload_dir.iconv("utf-8", "gbk", $file['name']))){
						$err_msg = 'Error moving the file to its destination, '.
							"please try again <a href='{$upload_page}'>here</a>.";
					}
				}


				if ($err_msg) {
					echo $err_msg;
				}else{
					/*将上传的文件路径保存到数据库 recImg 表*/
					require_once("class_recimg.php");
					$img = new recimg;
					$img->__set("recipeId",$id);
					$img->__set("imgpath",$upload_dir.$file["name"]);
					$img->addNew();
					$img=NULL;
					print "<img src='".$upload_dir.$file["name"]."'/>";
				}
			}
		}
	}while(0);

		/* 上传程序 --End*/

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
		// echo "<script>alert('配方: ".$_REQUEST["rName"]." 增加成功!');location.href='index.php';</script>";
		print("<br />保存配方成功！<br />");
		print("<a href='index.php'>查看配方</a>");

	}
?>