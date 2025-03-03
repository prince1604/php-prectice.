<?php
$rows = isset($_POST['rows']) ? (int)$_POST['rows'] : 5; 
$output = ""; 
for ($i = 1; $i <= $rows; $i++) {
    $output .= implode('', range(1, $i)) . "<br>"; 
}

if ($output) {
    echo nl2br($output); 
}
?>