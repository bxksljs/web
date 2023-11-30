<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .calculator {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        input[type="text"],
        select,
        input[type="submit"] {
            padding: 10px;
            margin: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
            width: 100px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Simple PHP Calculator</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="num1" placeholder="Enter first number" required>
            <select name="operation" required>
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
            <input type="text" name="num2" placeholder="Enter second number" required>
            <input type="submit" name="calculate" value="Calculate">
        </form>

        <div class="result">
            <?php
            if (isset($_POST['calculate'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        
        // Perform calculation based on selected operation
        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    echo "Error! Division by zero is not allowed.";
                }
                break;
            default:
                echo "Invalid operation";
        }
        
        // Display the result
        if (isset($result)) {
            echo "<h3>Result: $result</h3>";
        }
    }
            ?>
        </div>
    </div>
</body>
</html>
