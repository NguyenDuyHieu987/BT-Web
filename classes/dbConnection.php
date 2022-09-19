<?php
class dbConnection
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "php_login";

    public function __construct()
    {
    }

    public function getConnection()
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";

        return $conn;
    }
}