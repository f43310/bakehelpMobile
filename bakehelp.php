<?php
// checkinput
function checkinput($str){
 	  if(strlen($str) <6 ||strlen($str) >30){
          echo "<script>alert('你输入的字符串不能少于6个字符');location.href='login.php';</script>";
 	  	return;
 	  }else{
 	  	return mysql_escape_string($str);

 	  }
}
?>