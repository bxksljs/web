<!DOCTYPE HTML>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #BA78F4;
            margin: 20px;
            text-align: center;
        }

        h2 {
            color: #333333;
        }

        .error {
            color: #FF0000;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #DFC1FA;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <?php
        $nameErr = $emailErr = $genderErr = $websiteErr = "";
        $name = $email = $gender = $comment = $website = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {

                $nameErr = "Please enter a valid name";
    
            } else {
    
                $name = test_input($_POST["name"]);
    
                // check if name only contains letters and whitespace
    
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    
                $nameErr = "Only letters and white space allowed";
    
                }
    
            }
    
            if (empty($_POST["email"])) {
    
                $emailErr = "valid Email address";
    
            } else {
    
                $email = test_input($_POST["email"]);
    
                // check if e-mail address is well-formed
    
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
                $emailErr = "The email address is incorrect";
    
                }
    
            }  
    
            if (empty($_POST["website"])) {
    
                $website = "";
    
            } else {
    
                $website = test_input($_POST["website"]);
    
                // check if URL address syntax is valid
    
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
    
                $websiteErr = "Enter a valid Webiste URL";
    
                }    
    
            }
    
            if (empty($_POST["comment"])) {
    
                $comment = "";
    
            } else {
    
                $comment = test_input($_POST["comment"]);
    
            }        
    
            if (empty($_POST["gender"])) {
    
                $genderErr = "Please select a gender";
    
            } else {
    
                $gender = test_input($_POST["gender"]);
    
            }
        }

        function test_input($data) {
            $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
        }
    ?>

    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        FullName: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>

        E-mail address: <input type="text" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>

        Website: <input type="text" name="website">
        <span class="error"><?php echo $websiteErr;?></span>
        <br><br>

        Comment: <textarea name="comment" rows="2" cols="10"></textarea>
        <br><br>

        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">  
    </form>

    <?php
        echo "<h2> Final Output:</h2>";
        echo $name . "<br>";
        echo $email . "<br>";
        echo $website . "<br>";
        echo $comment . "<br>";
        echo $gender;
    ?>

</body>
</html>
