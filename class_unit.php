<?php
	require_once("class_database.php");

	/**
	* 
	*/
	class unit
	{
		private $id;
		private $name;
		private $otherUnit;
		private $quantity;
		private $gQuantity;
		private $gPerOU;


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
		
		function __construct()
		{
			# code...
		}

		// addnew
		function addnew(){
			$db = new database;
			$sql = "INSERT INTO units (name,otherUnit,quantity,gQuantity,gPerOU)";
			$sql .= " VALUES ('$this->name','$this->otherUnit','$this->quantity','$this->gQuantity','$this->gPerOU')";
			// echo $sql;

			$db->execute($sql);
			$db=null;
		}


		function update(){
			$db = new database;
			$sql = "UPDATE units SET ";
			$sql .= "name='$this->name', otherUnit='$this->otherUnit',quantity='$this->quantity',gQuantity='$this->gQuantity',gPerOU='$this->gPerOU'";
			$sql .= " where id=$this->id";
			$db->execute($sql);
			$db=null;

		}
		// query by id
		function query(){
			$db = new database;
			$sql = "SELECT * FROM units ";
			$sql .= " WHERE id =$this->id";
			$unit = $db->executeSFOR($sql);
			$db=null;
			return $unit;
		}

		// queryAll
		function queryAll(){
			$db = new database;
			$sql = "SELECT *FROM units";
			$arr_units = $db->query($sql);
			$db=null;
			return $arr_units;
		}

		// queryRowsNum
		function queryRowsNum(){
			$db = new database;
			$sql = "SELECT *FROM units";
			$rowsNum = $db->queryRows($sql);
			$db = null;
			return $rowsNum;
		}

		// delete by id
		function delete(){
			$db = new database;
			$sql = "DELETE FROM units where id=$this->id";
			$db->execute($sql);
			$db = null;
		}
	}
?>