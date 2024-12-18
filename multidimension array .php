<?php
$cars=array(
    array("volvo",22,18),
    array("bmw",15,13),
    array("saab",5,2),
    array("land rover",17,15)
);
for($row = 0; $row < 4; $row++) {
    echo "<p><b>row number $row</b></p>";
    echo "<ul>";
        for($col=0;$col<3;$col++){
            echo "<li>".$cars[$row][$col]."</li>";
        }
        echo "</ul>";
}
?>