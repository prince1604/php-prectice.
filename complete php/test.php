<?php
$rows = 7; 
$number = 1;
$count = 0; 

for ($i = 1; $i <= $rows * ($rows + 1) / 2; $i++) { 
    echo $number . " "; 
    $count++; 
    if ($count == $number) {
        echo "<br>"; 
        $number++; 
        $count = 0;                 
    }
}
?>

