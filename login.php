<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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

<h2>🔐 Secure Login</h2>
// Step 2: authentication logic added
<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    if ($user) {

        if ($user['failed_attempts'] >= 3) {

            echo "<p style='color:red;'>Account locked! Too many attempts.</p>";
            $conn->query("INSERT INTO logs (username, ip, status) VALUES ('$username', '$ip', 'LOCKED')");

        } else {

            if (password_verify($password, $user['password'])) {

                if ($user['last_ip'] && $user['last_ip'] != $ip) {
                    echo "<p style='color:orange;'>⚠ Suspicious login from new IP!</p>";
                }

                $conn->query("UPDATE users SET failed_attempts=0, last_ip='$ip' WHERE username='$username'");
                $conn->query("INSERT INTO logs (username, ip, status) VALUES ('$username', '$ip', 'SUCCESS')");

                         $_SESSION['user'] = $username;

// 🔐 Admin check
if ($username == "admin") {
    header("Location: admin_dashboard.php");
} else {
    header("Location: dashboard.php");
}
exit();

            } else {

                $conn->query("UPDATE users SET failed_attempts = failed_attempts + 1 WHERE username='$username'");
                $conn->query("INSERT INTO logs (username, ip, status) VALUES ('$username', '$ip', 'FAILED')");

                echo "<p style='color:red;'>Wrong password!</p>";
            }
        }

    } else {

        $conn->query("INSERT INTO logs (username, ip, status) VALUES ('$username', '$ip', 'NO_USER')");
        echo "<p style='color:red;'>User not found!</p>";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="login">Login</button>
</form>

<a href="register.php">Create Account</a>

</div>

</body>
</html>
