<?php
	require_once("class_database.php");
	class recimg{
		private $id;
		private $imgpath;
		private $recipeId;

		// 方法
 		// __get(): 获取属性值
 		function __get($property_name){
 			if (isset($property_name)){
 				return $this->$property_name;		// 这里的 property_name 前必须加 $ 否则 错误!
 			}else{
 				return null;
 			}

 		}

 		// __set(): 设置属性值
 		function __set($property_name, $value){
 			$this->$property_name=$value;		// 这里的 property_name 前必须加 $ 否则 错误!

 		}

 		function addNew(){
 			$db = new database;
 			$sql = "INSERT INTO recimg (recipeId,imgpath) ";
 			$sql .= "VALUES ($this->recipeId,'$this->imgpath')";
 			// echo $sql;
 			$db->execute($sql);
 			$db=null;
 		}

 		function query(){
 			$db = new database;
 			$sql = "SELECT *FROM recimg ";
 			$sql .= "where recipeId = $this->recipeId";
 			$arr_img = $db->query($sql);
 			$db=null;
 			return $arr_img;
 		}

 		function delete(){
 			$db= new database;
 			$sql = "DELETE FROM recimg where recipeId=$this->recipeId";
 			$db->execute($sql);
 			$db=null;
 		}


	}
?>