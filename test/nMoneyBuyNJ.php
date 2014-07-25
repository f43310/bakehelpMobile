<?php

	/**
	* 面向对象解决n钱买n鸡问题
	* 我采用的是穷举法
	* by Linda
	*/
	abstract class chicken
	{
		const HAVE_MONEY = 100;		
		const CHICKEN_SUM= 100;
		abstract public function sumMoney();
	}

	/**
	* 
	*/
	class maleChicken extends chicken
	{
		const value=5;
		private $num;
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


 		// 求该鸡总钱数
 		public function sumMoney(){
 			return $this->num*self::value;
 		}
	}

	/**
	* 
	*/
	class femaleChicken extends chicken
	{
		const value = 3;
		private $num;
		
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


 		// 求该鸡总钱数
 		public function sumMoney(){
 			return $this->num*self::value;
 		}
	}

	/**
	* 
	*/
	class sonChicken extends chicken
	{
		private $value;
		private $num;

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

 		// 求该鸡总钱数
 		public function sumMoney(){
 			return $this->num*$this->value;
 		}
	}


	for ($i=1; $i < chicken::CHICKEN_SUM; $i++) { 
		for ($j=1; $j < chicken::CHICKEN_SUM; $j++) { 
			for ($n=1; $n < chicken::CHICKEN_SUM; $n++) { 
				$gj = new maleChicken;
				$mj = new femaleChicken;
				$sj = new sonChicken;
				$gj->__set("num",$n);
				$mj->__set("num",$j);
				$sj->__set("num",$i);
				$sj->__set("value",1/3);
				$gjm=$gj->sumMoney();
				$mjm=$mj->sumMoney();
				$sjm=$sj->sumMoney();
				$gj=null;
				$mj=null;
				$sj=null;
				if ((($sjm+$mjm+$gjm)==chicken::HAVE_MONEY) && ($i + $j + $n == chicken::CHICKEN_SUM)) {
					$method[]="公鸡:".$n."只 母鸡:".$j."只 雏鸡:".$i."只 ";
				}

			}
		}
	}

	foreach ($method as $key => $value) {
		print "#$key $value"."<br/>";
	}

?>