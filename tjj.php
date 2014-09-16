<?php
	require_once("class_database.php");
	/**
	* 
	*/
	class tjj
	{
		private $id;
		private $recipeId;
		private $name;
		private $tjjM;
		private $actPerc;
		private $nowSum;

		// 方法
		// __get(): 获取属性值
 		function __get($property_name){
 			if (isset($property_name)){
 				return $this->$property_name;		// 这里的 property_name 前必须加 $
 			}else{
 				return null;
 			}

 		}

 		// __set(): 设置属性值
 		function __set($property_name, $value){
 			$this->$property_name=$value;			// 这里的 property_name 前必须加 $
 		}

 		// __construct : 构造函数
 		function __construct(){

 		}

 		// __destruct : 析构函数
 		function __destruct(){

 		}

 		// addNew
 		function addNew(){
 			$db = new database;
 			$sql = "INSERT INTO tjj";
 			$sql .= " (recipeId,name,tjjM,actPerc,nowSum) ";
 			$sql .= "VALUES ($this->recipeId,'$this->name',$this->tjjM,$this->actPerc,$this->nowSum)";
 			// echo $sql;
 			// return;
 			$db->execute($sql);
 			$db=null;
 		}

 		// query
 		function query(){
 			$db = new database;
 			$sql = "SELECT DISTINCT actPerc,name from tjj ";
 			$sql .= "WHERE recipeId=$this->recipeId";
 			// echo $sql;
 			// return;

 			$arr_result = $db->query($sql);

 			$db=null;
 			return $arr_result;
 		}
	}
?>