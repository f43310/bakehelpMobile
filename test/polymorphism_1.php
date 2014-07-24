<?php

	/**
	* 
	*/
	class cat
	{
		
		function miao()
		{
			print("miao!");
		}
	}

	/**
	* 
	*/
	class dog
	{
		
		function wang()
		{
			print("wang!");
		}
	}

	function printTheRightSound($obj){
		if($obj instanceof cat){
			$obj->miao();
		}else if($obj instanceof dog){
			$obj->wang();
		}else{
			print("Error: Passed the wrong kind of object!");
		}
		print("<br>");
	}

	printTheRightSound(new cat);
	printTheRightSound(new dog);
?>