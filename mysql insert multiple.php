<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->begin_transaction();
    $conn->exec("insert into myguests (firstname, lastname, email)
    value('john','doe','john@example.com')";
    $conn->exec("insert into myguests (firstname, lastname, email)
    value('mary','moe','mary@example.com')";
    $conn->exec("insert into myguests (firstname, lastname, email)
    values ('julie','dooley','juli@example.com')";

    $conn->commit();
    echo"new records created successfully";
} catch (PDOException $e) {
    $conn->rollback();
    echo "error: ". $e->getMessage();
}
$conn = null;
?>