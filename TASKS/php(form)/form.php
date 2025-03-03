<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function validateInput($input) {
    if (empty($input)) {
        return "Input cannot be empty.";
    }
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function validateEmail($email) {
    $emailRegex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (!preg_match($emailRegex, $email)) {
        return "Invalid email address.";
    }
    return $email;
}

function handleError($error) {
    if (!empty($error)) {
        error_log("Error: " . $error);
        die("An error occurred: " . $error);
    } else {
        die("An unknown error occurred.");
    }
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $name = validateInput($_POST['name']);
    $email = validateEmail(validateInput($_POST['email']));
    $msg = validateInput($_POST['msg']);

    if (strpos($email, "Invalid") !== false) {
        die($email); // Display email validation error
    }

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    if (!$stmt) {
        handleError($conn->error);
    }

    // Bind parameters
    if (!$stmt->bind_param("sss", $name, $email, $msg)) {
        handleError($stmt->error);
    }

    // Execute the query
    if (!$stmt->execute()) {
        handleError($stmt->error);
    }

    try {
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        error_log("Error closing database connection: " . $e->getMessage());
    }

    echo "Message saved successfully!";
}
?>
<form action="form.php" method="post"></form>
<?php
?>