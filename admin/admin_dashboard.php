<?php
// session_start();

require_once '../auth/session_check.php';


// if ($_SESSION['role'] != 'admin') {
//     header("Location: ../auth/login.php"); // Redirect to Login if not admin
//     exit();
// }

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!-- Admin dashboard content here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 15px;
            display: block;
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#"><i class="fas fa-users"></i> Customers</a>
        <a href="#"><i class="fas fa-list"></i> Categories</a>
        <a href="#"><i class="fas fa-box"></i> Products</a>
        <a href="#"><i class="fas fa-truck"></i> Suppliers</a>
        <a href="#"><i class="fas fa-cart-plus"></i> Receiving</a>
        <a href="#"><i class="fas fa-warehouse"></i> Inventory</a>
        <a href="#"><i class="fas fa-chart-line"></i> Sales</a>
        <a href="#"><i class="fas fa-cogs"></i> Admin Settings</a>
        <a href="../auth/logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <h2>Welcome, Admin!</h2>
        <p>Here is an overview of your system.</p>
    </div>
</body>
</html>