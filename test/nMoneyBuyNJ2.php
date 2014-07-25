<?php

	/**
	* 面向对象解决n钱买n鸡问题
	* 我采用的是穷举法
	* by Linda
	*/
	class chicken
	{
		const HAVE_MONEY = 100;		// n钱
		const CHICKEN_SUM= 100;		// n鸡
	}

// main
	$method=array();
	for ($i=1; $i < chicken::HAVE_MONEY/5; $i++) {  // n钱最多买 n/5 只公鸡
		for ($j=1; $j < (chicken::HAVE_MONEY-$i*5)/3; $j++) { // 买了公鸡还能买 (n-i*5)/3 只母鸡
				if ($i+$j+(chicken::HAVE_MONEY-$i*5-$j*3)*3==chicken::CHICKEN_SUM) { // 公鸡母鸡都买了剩下的钱能买(n-$i*5-$j*3)*3只雏鸡
					$method[]="公鸡:".$i."只 母鸡:".$j."只 雏鸡:".((chicken::HAVE_MONEY-$i*5-$j*3)*3)."只";
				}

			// }
		}
	}

	foreach ($method as $key => $value) {
		print "#$key $value"."<br/>";
	}

?>