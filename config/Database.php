<?php
class Database {
    private $host = "localhost";  
    private $db_name = "sales_db";  
    private $username = "root";  
    private $password = "";  
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
            $this->username, 
            $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection error: " . $exception->getMessage()); // Show exact error
        }
        return $this->conn;
    }
}
?>
