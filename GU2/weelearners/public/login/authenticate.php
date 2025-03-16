<?php
// Start sessions and include the database configuration file
require 'config/config.php';
session_start();

// Check if login form was submitted
if (empty($_POST['username']) || empty($_POST['password'])) {
    // Set a session error message and redirect to the login page if fields are empty
    $_SESSION['status_message'] = 'Please fill both the username and password fields!';
    header('Location: login');
    exit();
}

// Prepare SQL statement to prevent SQL injection
if ($auth = $conn->prepare("SELECT 
id,
password, 
is_admin 
FROM user 
WHERE username = ?")) {
    
// Bind the input parameter (username) and execute the statement
$auth->bind_param('s', $_POST['username']);
$auth->execute();
$auth->store_result();

// Check if the username exists
if ($auth->num_rows > 0) {
    $auth->bind_result($id, $password, $admin);
    $auth->fetch();
    
    // Verify the password using password_verify
    if (password_verify($_POST['password'], $password)) {
        // Password is correct, start user session
        session_regenerate_id();
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $id;
        $_SESSION['is_admin'] = $admin;
        
        // Set a cookie with the username (HTTP only and secure)
        setcookie("username", $_POST['username'], time() + 86400, "/", "", true, true);
        // Redirect based on user type (admin or regular user)
        
        if ($admin == 1) {
            header('Location: admin');
        } else {
            header('Location: user');
        }
            exit();
        } else {
            // Incorrect password
            $_SESSION['status_message'] = 'Incorrect username or password!';
            header('Location: login');
            exit();
        }
    } else {
        // Username does not exist
        $_SESSION['status_message'] = 'Incorrect username or password';
        header('Location: login');
        exit();
    }
    // / Close the statement
    $auth->close();
} else {
    // SQL statement preparation failed
    $_SESSION['status_message'] = 'Login system error. Please try again later.';
    header('Location: login');
    exit();
}
?>
