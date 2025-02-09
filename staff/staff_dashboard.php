<?php
// session_start();

// require_once '../auth/session_check.php';
if ($_SESSION['role'] != 'staff') {
    header("Location: ../auth/login.php"); // Redirect to Login if not staff
    exit();
}

if ($_SESSION['role'] !== 'staff') {
    header("Location: ../auth/unauthorized.php"); // Redirect to an "unauthorized access" page
    exit();
}

?>
<h1>WELCOME to STAFF <?php echo $_SESSION['username']; ?> dashboard!</h1>
<a href="../auth/logout.php">Logout</a>
