<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f4f6f9;
        }

        .navbar {
            background: #667eea;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
        }

        .container {
            padding: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
// user dashboard with session handling
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<div class="navbar">
    <div>👤 User Dashboard</div>
    <div>
        Welcome <?php echo $_SESSION['user']; ?> |
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
    <div class="card">
        <h2>Welcome!</h2>
        <p>You are logged in successfully.</p>
        <p>Your account is secure ✅</p>
    </div>
</div>

</body>
</html>