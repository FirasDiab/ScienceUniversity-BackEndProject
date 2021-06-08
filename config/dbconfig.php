<?php
// $servername = "localhost";
// $username = "root";
// $password = "123456";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=Science_uni", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }

// Singleton to connect db.
// class ConnectDb {
//   // Hold the class instance.
//   private static $instance = null;
//   private $conn;
//   private $host = 'localhost';
//   private $user = 'root';
//   private $pass = '123456';
//   private $name = 'Science_uni';  // The db connection is established in the private constructor.
//   private function __construct()
//   {
//     $this->conn = new PDO("mysql:host={$this->host};
//     dbname={$this->name}", $this->user,$this->pass,
//     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
//   }  public static function getInstance()
//   {
//     if(!self::$instance)
//     {
//       self::$instance = new ConnectDb();
//     }    return self::$instance;
//   }  public function getConnection()
//   {
//     return $this->conn;
//   }
// }




// use su\ConnectDb;
// class News implements EntityCRUD {
//   private $conn = null;  // DI + singleton
//   public function __construct() {
//     $instance = ConnectDb::getInstance();
//     $this->conn = $instance->getConnection();
//   }
// }
class ConnectDb {
  private $host ='localhost';
  private $user ='root';
  private $pass ='123456';
  private $dbname ='Science_uni';
  private $dbh;
  private $error;
  private $stmt;    public function __construct(){
      // Set DSN
      $dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbname.'';
      // Set Options
      $options = array(
          PDO::ATTR_PERSISTENT => true,
          PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
      );
      // Create new PDO
      try {
          $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      } catch(PDOException $e){
          $this->error = $e->getMessage();
      }
  }
  public function query($query){
      $this->stmt = $this->dbh->prepare($query);
  }    public function bind($param, $value, $type = null){
      if(is_null($type)){
          switch(true){
              case is_int($value):
                  $type = PDO::PARAM_INT;
                  break;
              case is_bool($value):
                  $type = PDO::PARAM_BOOL;
                  break;
              case is_null($value):
                  $type = PDO::PARAM_NULL;
                  break;
                  default:
                  $type = PDO::PARAM_STR;
          }
      }
      $this->stmt->bindValue($param,  $value, $type);
  }    public function execute(){
      return $this->stmt->execute();
  }    public function resultset(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }}
?> 

