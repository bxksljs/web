<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace this with your actual authentication logic (e.g., fetching user data from a database)
    $valid_username = 'user';
    $valid_password = 'password';

    // Retrieve input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password match
    if ($username === $valid_username && $password === $valid_password) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Set a cookie if "Remember Me" is checked
        if (!empty($_POST['remember'])) {
            setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie for 30 days
        }

        // Redirect to a dashboard or a protected page
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>
