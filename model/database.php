<?php
class Database{
  private $host;
  private  $db_name;
  private  $username;
  private  $password;

  // contructor to set database credentials
  public function __construct(){
      $this->host = "localhost";
      $this->db_name = "culturedev1";
      $this->password = '';
      $this->username = 'root';
  }
  // database connection
  public function connect(){
      // $this->conn = null;
      try {
          $conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // echo "Connected successfully";
          return $conn;
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
          die();
        }
    }
}

// $test=new Database();
// $test->connect();



?>