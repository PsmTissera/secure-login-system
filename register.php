<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: linear-gradient(to right, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            width: 320px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #5a67d8;
        }

        a {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="box">

<h2>📝 Create Account</h2>

<?php
include "db.php";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password != $confirm) {
        echo "<p style='color:red;'>Passwords do not match!</p>";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) 
                VALUES ('$username', '$email', '$hashed')";

        if ($conn->query($sql)) {
            echo "<p style='color:green;'>Registered successfully</p>";
        }
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <button name="register">Register</button>
</form>

<a href="login.php">Already have an account?</a>

</div>

</body>
</html>