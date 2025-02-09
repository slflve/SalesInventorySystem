<?php 
session_start();
require_once 'config/Database.php';

$database = new Database();
$conn = $database->connect();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = trim($_POST['role']?? 'staff');

    // Check if username already exists
    $checkQuery = "SELECT COUNT(*) FROM users WHERE username = :username";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->execute([':username' => $username]);
    $userExists = $checkStmt->fetchColumn();

    if ($userExists){
        $_SESSION['error'] = "Username taken. Please choose a different username.";
        header("Location: /SalesInventorySystem/register.php");
        exit();
    }

    // Insert user if username is available
    $query = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
    $stmt = $conn->prepare($query);
    


    try {
        if($stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role
        ])) {
            // Redirect to Login page after successful registration
            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: /SalesInventorySystem/auth/login.php");
            die("Redirecting to login...");
        } else {
            $_SESSION['error'] = "Something went wrong. Please try Again.";
            header("Location: /SalesInventorySystem/register.php");
            exit();
        }

    } catch (PDOException $e){
        $_SESSION['error'] = "Registration failed: " .$e->getMessage();

        header("Location: /SalesInventorySystem/register.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="vewport" content="width=device-width, initial-scale-1.0">

        <title>Register</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container mt-5">
        <h2>Register</h2>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    </body>
</html>