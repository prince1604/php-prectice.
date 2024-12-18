<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection failed: ". mysqli_error($conn));
}

$sql = "DELETE FROM myguests WHERE id = 3";

if (!$conn) {
    die("connection failed: ". mysqli_connect_error());
}

$sql = "DELETE FROM myguests WHERE id = 3";

if (mysqli_query($conn, $sql)) {
    echo "record deleted successfully" ;
} else {
    echo "error deleting record: ". mysqli_error($conn);
}
mysqli_close($conn);
?>