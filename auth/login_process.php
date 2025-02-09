<?php 

session_start();
require_once '../config/Database.php';

$database = new Database();
$conn = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    

    $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        echo "Role: " . $_SESSION['role'];
        if (trim(strtolower($user['role'])) == 'admin') {
            header("Location: /SalesInventorySystem/admin/admin_dashboard.php");
        } else if (trim(strtolower($user['role'])) == 'staff') {
            header("Location: /SalesInventorySystem/staff/staff_dashboard.php");
        }
        
        exit();
    }
}

?>