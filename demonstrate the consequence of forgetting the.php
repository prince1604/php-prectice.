<?php
$cars = array("volvo","bmw","toyota");
foreach ($cars as &$x) {
    $x = "ford";
}
$x="ice cream";

var_dump($cars);
?>