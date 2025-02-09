<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/Database.php';

$database = new Database();
$conn = $database->connect();

if ($conn) {
    die("✅ Database connected successfully.");
} else {
    die("❌ Database connection failed.");
}
?>
