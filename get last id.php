<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
$sql = "insert into myguests (firstname, lastname, email)
values ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo"new record created successfully. last inserted in is: ". $last_id;
} else {
    echo "error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>