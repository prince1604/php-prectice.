<?php
function divide($divided, $divisor) {
    if($divisor == 0) {
        throw new exception("division by zero");
    }
    return $divided / $divisor; 
}
try{
    echo divide(5,0);
} catch(Exception $e) { 
    echo "unable to divide.";
}
?>