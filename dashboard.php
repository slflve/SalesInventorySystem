<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Get the current script name
$currentPage = basename($_SERVER['PHP_SELF']);

// Prevent infinite redirect loop
if ($_SESSION['role'] == 'admin' && $currentPage !== 'admin_dashboard.php') {
    if ($currentPage !== 'dashboard.php') { // Prevent loop
        header("Location: /SalesInventorySystem/admin/admin_dashboard.php");
        exit();
    }
} elseif ($_SESSION['role'] == 'staff' && $currentPage !== 'staff_dashboard.php') {
    if ($currentPage !== 'dashboard.php') { // Prevent loop
        header("Location: /SalesInventorySystem/staff/staff_dashboard.php");
        exit();
    }
}

// If already on the correct dashboard, display content
echo "Welcome to your dashboard, " . $_SESSION['role'];
?>
