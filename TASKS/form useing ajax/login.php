<?php
session_start();

// Database configuration (use environment variables or a config file in production)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'users');

// Connect to the database
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables
$username = "";
$email = "";
$errors = [];

// Function to display errors
function displayErrors($errors) {
    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
    }
}

// Function to register a user
function registerUser ($db, $username, $email, $password_1, $password_2) {
    global $errors;

    // Validate form inputs
    if (empty($username)) array_push($errors, "Username is required");
    if (empty($email)) array_push($errors, "Email is required");
    if (empty($password_1)) array_push($errors, "Password is required");
    if ($password_1 !== $password_2) array_push($errors, "The two passwords do not match");

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email format");
    }

    // Check if user already exists
    $user_check_query = "SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1";
    $stmt = mysqli_prepare($db, $user_check_query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) array_push($errors, "Username already exists");
        if ($user['email'] === $email) array_push($errors, "Email already exists");
    }

    // Register user if no errors
    if (count($errors) === 0) {
        $password = password_hash($password_1, PASSWORD_DEFAULT); // Secure password hashing
        $query = "INSERT INTO users (username, email) VALUES (?, ?)";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
        mysqli_stmt_execute($stmt);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('Location: index.php');
        exit();
    }
}

// Function to log in a user
function loginUser ($db, $username, $password) {
    global $errors;

    // Validate form inputs
    if (empty($username)) array_push($errors, "Username is required");
    if (empty($password)) array_push($errors, "Password is required");

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('Location: index.php');
            exit();
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

// Handle registration
if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    
    registerUser ($db, $username, $email, $password_1, $password_2);
    displayErrors($errors);
}

// Handle login
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    loginUser ($db, $username, $password);
    displayErrors($errors);
}

?>