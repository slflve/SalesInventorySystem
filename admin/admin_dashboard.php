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
    <link rel="stylesheet" href="../admin/assets/css/style.css"> <!-- Linking external CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="admin_dashboard.php" class="<?= $current_page == 'admin_dashboard.php' ? 'active' : '' ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="customers.php" class="<?= $current_page == 'customers.php' ? 'active' : '' ?>"><i class="fas fa-users"></i> Customers</a>
        <a href="categories.php" class="<?= $current_page == 'categories.php' ? 'active' : '' ?>"><i class="fas fa-list"></i> Categories</a>
        <a href="products.php" class="<?= $current_page == 'products.php' ? 'active' : '' ?>"><i class="fas fa-box"></i> Products</a>
        <a href="suppliers.php" class="<?= $current_page == 'suppliers.php' ? 'active' : '' ?>"><i class="fas fa-truck"></i> Suppliers</a>
        <a href="receiving.php" class="<?= $current_page == 'receiving.php' ? 'active' : '' ?>"><i class="fas fa-cart-plus"></i> Receiving</a>
        <a href="inventory.php" class="<?= $current_page == 'inventory.php' ? 'active' : '' ?>"><i class="fas fa-warehouse"></i> Inventory</a>
        <a href="sales.php" class="<?= $current_page == 'sales.php' ? 'active' : '' ?>"><i class="fas fa-chart-line"></i> Sales</a>
        <a href="admin_settings.php" class="<?= $current_page == 'admin_settings.php' ? 'active' : '' ?>"><i class="fas fa-cogs"></i> Admin Settings</a>
        <a href="../auth/logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <h2>Welcome, Admin!</h2>
        <p>Here is an overview of your system.</p>
    </div>

    <script src="../admin/assets/js/script.js"></script> <!-- Link to external JS -->
</body>
</html>