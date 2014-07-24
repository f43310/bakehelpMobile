<?php
	abstract class Animals
	{
		abstract protected function makeSound();
	}

	/**
	* 
	*/
	class Cat extends Animals
	{
		
		function makeSound()
		{
			print("miao!");
		}
	}

	/**
	* 
	*/
	class Dog extends Animals
	{
		
		function makeSound()
		{
			print("wang!");
		}
	}

	class Fox extends Animals
	{
		function makeSound(){
			print "jiu!!";
		}
	}

	function printTheRightSound($obj){
		if($obj instanceof Animals){
			$obj->makeSound();
		}else{
			print("Error: Passed the wrong kind of object!");
		}
		print("<br>");
	}

	printTheRightSound(new Cat);
	printTheRightSound(new Dog);
	printTheRightSound(new Fox);
?>