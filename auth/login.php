<?php 
session_start();



// if user is already logged-in, redirect them to dashboard
if(isset($_SESSION['user_id'])) {
    header("Location: ../dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 350px;">
            <h3 class="text-center">Login</h3>
            <?php 
                if (isset($_SESSION['success'])) {
                    echo "<p style='color: green;'>". $_SESSION['success']. "</p>";
                    unset($_SESSION['success']); // Clear after displaying
                }
                
                if (isset($_SESSION['error'])){
                    echo "<p style='color: red;'>" .$_SESSION['error'] . "</p>";
                    unset($_SESSION['error']); // Clear after displaying
                }
            ?>
            <form id="loginForm" action="../auth/login_process.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <div class="text-center mt-3">
                <p>Don't have an account? <a href="../register.php">Register</a></p>
            </div>
        </div>
    </div>

    <!-- <script>
        $(document).ready(function(){
            $("#loginForm").submit(function(e){
                e.preventDefault(); 

                $.ajax({
                    type: "POST",
                    url: "../auth/login_process.php",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response){
                        if(response.status === 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                text: 'Redirecting to dashboard...',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = '../dashboard.php';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Failed',
                                text: response.message
                            });
                        }
                    }
                });
            });
        });
    </script>
     -->
</body>
</html>