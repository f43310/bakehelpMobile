<?php
	require_once("class_database.php");
	/**
	* 
	*/
	class tsptog
	{
		private $id;
		private $tsp;
		private $g;

		// 方法
		function __get($property_name){
			if (isset($property_name)) {
				return $this->$property_name;
			} else {
				return NULL;
			}
			
			
		}

		function __set($property_name,$value){
			$this->$property_name=$value;
		}

		
		function __construct()
		{
			
		}

		function query(){
			$db=new database;
			$sql="SELECT *FROM unitqu where tsp like '%$this->tsp%'";
			$arr_tsptog=$db->query($sql);
			return $arr_tsptog;
			$db=null;
		}
	}
?>