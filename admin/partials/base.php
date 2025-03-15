<?php 
session_start();
require_once '../SalesInventorySystem/auth/session_check.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Sidebar -->
    <?php include '../partials/sidebar.php'; ?>
    
    <div class="main-content">
        <!-- Header -->
        <?php include '../partials/header.php'; ?>
        
        <div class="container mt-4">
            <!-- Main content of each page will go here -->
            <?php echo $content ?? '<h2>Welcome to the Admin Dashboard</h2>'; ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../partials/footer.php'; ?>
</body>
</html>