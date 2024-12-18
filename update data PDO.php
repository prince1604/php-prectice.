<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
    
    $conn = new PDO("mysql:host=$servername, $username, $password, $dbname", 
    $username, $password);
    

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE myguests set lastname='doe' where id=2";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    echo$stmt->rowcount() . "records updated successfully" ;
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
