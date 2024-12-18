<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("connection". mysqli_connect_error());
}

$sql = "select id ,firstname, lastname from myguests order by lastname;"
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " .$row["id"]. " - name: " .$row["firstname"]. " " .$row["lastname"]."<br>";
    }
} else {
    echo "0 reults";
}
mysqli_close($conn);
?>