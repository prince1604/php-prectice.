<html>
    <body>
        <form method="post" action=""<?php echo $_SERVER['PHP_SELF'];?>"
            name: <input type="text" name="fname">
            <input type="submit">
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "post"){
            $name = htmlspecialchars($_POST["fname"]);              
            if(empty($name)){
                echo "name is empty";
        }else{
            echo $name;
        }
    }
    ?>
        </form>
    </body>
</html>