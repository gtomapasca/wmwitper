<?php

/* Patrones de diseño: Factory y Compose */
function make($cls, $value, $name='') {
	//echo "<p>make-> cls:".$cls." - value: " .$value. " - name: " .$name."</p>";
	$property = ($name) ? $name : strtolower($cls) . '_id';
	$obj = new $cls();
	$obj->$property = $value;
	$obj->get();
	return $obj;
}

?>
