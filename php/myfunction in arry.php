<html>
<body>
    <?php
    function myfunction(){
        echo "i come from a function!";
    }
    $myarr = array("volvo",15,myfunction);
    $myarr[2](2);
    ?>
</body>
</html>