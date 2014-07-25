<?php
/**
 * 穷举法解N钱买N鸡的问题
 **/
function getNumber($n) {
 //符合条件的数组
 $array = array();
 for($a = 1; $a <= $n; $a++) { //$a即公鸡的数量
  for($b = 1; $b <= $n; $b++){ //$b即母鸡的数量
   for($c = 1; $c <= $n; $c++){
    if(!($c % 3) && (($a + $b + $c) == $n) 
                                      && ((5 * $a + 3 * $b + $c / 3) == $n)){ //$c即小鸡的数量
     $array[] = array($a, $b, $c);
    }
   }
  }
 }
 return $array;
}
echo "<pre>";
print_r(getNumber(100));
?>