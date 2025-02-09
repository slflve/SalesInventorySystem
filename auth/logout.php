<?php
session_start();
session_unset();
session_destroy();

// Delete the session cookie
setcookie(session_name(), '', time() - 3600, '/'); 

header("Location: ../auth/login.php");
exit();
?>
