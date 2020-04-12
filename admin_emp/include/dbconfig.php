<?php
class Database {

    private $host = "localhost";
    private $db_name = "ridaitsc_jobportal_db";
    private $username = "ridaitsc_meemone";
    private $password = "meem@LxB1B*RY^G";
    public $conn;

    public function dbConnection() {

        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

}

?>