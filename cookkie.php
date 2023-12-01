<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #007bff;
        }
        .login-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .login-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        .login-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .success-message {
            color: #00a000;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Form</h2>
        <?php
        session_start(); // Starting the session

        // Incrementing the visit count in the session
        if (isset($_SESSION['visits'])) {
            $_SESSION['visits']++;
        } else {
            $_SESSION['visits'] = 1;
        }

        // Displaying the visit count
        echo "<p>Page visits: " . $_SESSION['visits'] . "</p>";

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];  

            if (!empty($username) && !empty($password)) {
                // Set a cookie with the entered username
                setcookie('user_cookie', $username, time() + (86400 * 30), "/"); // Cookie expires in 30 days
                echo "<p class='success-message'>Cookie set successfully. You are logged in as: " . $username . "</p>";
            } else {
                echo "<p class='error-message'>Username and password are required.</p>";
            }
        }
        ?>
        <form class="login-form" method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" name="submit" value="Log In">
        </form>
    </div>
</body>
</html>
