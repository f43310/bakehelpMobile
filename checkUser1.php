<?php
	session_start();
	if ($_REQUEST['submit']=="提  交"){
		if($_REQUEST[username]=="" || $_REQUEST[password]==""){
			echo "你填写的信息不完整";
			return;
		}else{
			if ($_REQUEST[username]=="bakemaster" && $_REQUEST[password]=="H6bV^V4l"){
				$_SESSION["loginSuccess"]=1;
				// echo "loginSuccess: ".$_SESSION["loginSuccess"];
				echo "<script>location='index.php';</script>";
				return;
			}else{
				require("relogin.php");
			}
		}
	}
	
?>