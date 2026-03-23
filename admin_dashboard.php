<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #667eea;
            color: white;
        }

        .success { color: green; }
        .failed { color: red; }
        .locked { color: orange; }

        a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

<?php
//user dashboard with session handling
session_start();
include "db.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] != "admin") {
    header("Location: login.php");
}
?>

<div class="navbar">
    <div>🛡️ Security Dashboard</div>
    <div>
        Welcome Admin |
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">

<div class="card">
    <h2>System Status</h2>
    <p>Security Monitoring Active ✅</p>
</div>

<div class="card">
    <h2>Login Logs</h2>

    <table>
        <tr>
            <th>Username</th>
            <th>IP</th>
            <th>Status</th>
            <th>Time</th>
        </tr>

<?php
$result = $conn->query("SELECT * FROM logs ORDER BY time DESC LIMIT 10");

while ($row = $result->fetch_assoc()) {

    $class = "";
    if ($row['status'] == "SUCCESS") $class = "success";
    else if ($row['status'] == "FAILED") $class = "failed";
    else if ($row['status'] == "LOCKED") $class = "locked";

    echo "<tr>
        <td>{$row['username']}</td>
        <td>{$row['ip']}</td>
        <td class='$class'>{$row['status']}</td>
        <td>{$row['time']}</td>
    </tr>";
}
?>

    </table>
</div>

</div>

</body>
</html>