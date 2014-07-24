<?php

$persons= array(1=>array("name"=>"John","age"=>38,"gender"=>"male"), 2=>array("name"=>"Andi","age"=>25,"gender"=>"female"), 3=>array("name"=>"Philips","age"=>22,"gender"=>"male"));
// $persons= array("John", "Andi", "Philips", "Barbara");
print("<pre>");
print_r($persons);
print("</pre>");
reset($persons);

// while (list($key, $person) = each($persons)) {
// 	// while (list($key, $person)=each($person)){
// 		print "$key ";
// 		print_r($person);
// 		print "<br />";
// 		while (list($key, $pers)=each($person)){
// 				// while (list($name, $age, $gender)= each($pers)) {
// 						print "#$key $pers<br />";
// 						// print "$name $age $gender<br />";
// 				// }
// 		}


// 	// print("<pre>");
// 	// print_r(each($person));
// 	// print("</pre>");

// }

// print("<hr />");
// return;
while($person = each($persons)) {
	reset($person);
	while (list($key, $value)= each($person["value"])) {
		print "$key $value<br />";
	}
}


?>