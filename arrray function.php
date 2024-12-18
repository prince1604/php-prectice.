<html>
<body>
<?php
function myfunction(): void{
    echo "I come from a function!";
}
$myarr=array("volvo",15,myfunction);

$myarr[2]();
?>
</body>
</html>
