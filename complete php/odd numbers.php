<?php
function OddNumbers($limit) {
    echo "Odd numbers from 1 to $limit are:<br>";
    for ($i = 1; $i <= $limit; $i++) {
        if ($i % 2 != 0) {
            echo $i . "<br>";
        }
    }
}
$limit = 100; 
OddNumbers($limit);
?>



