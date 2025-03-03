<?php
$number = 10; 
$fibonacci = [0, 1]; 

for ($i = 2; $i < $number; $i++) {
    $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
}

echo "Fibonacci series for $number terms: ";
echo implode(', ', $fibonacci);
?>

