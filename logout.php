//  logout functionality using session destroy
<?php
session_start();
session_unset();   // clear session
session_destroy(); // destroy session

header("Location: login.php");
exit();
?>