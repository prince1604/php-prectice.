<?php
$cars = array("volvo","bmw","toyota");
foreach ($cars as &$x) {
    $x = "ford";
}
unset($x);
var_dump($cars);
?>