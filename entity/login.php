<?php
session_start();
include_once('../config/dbconfig.php');

class Login extends ConnectDb {
    
    
    public function checkLogin($email,$pass) {
        $hashed = hash('sha512', $pass);
        $this->query('SELECT * FROM admin WHERE email = :email AND password = :password');
        $this->bind(':email',$email);
        $this->bind(':password',$hashed);
        $this->execute();
        $row=$this->resultset();

        if(sizeof($row[0]) >= 1){
            if($row[0]['role'] == 'superAdmin'){
            $_SESSION['superAdmin'] = $row[0];
            // print_r($_SESSION['superAdmin']);
            header("Location:../Admin-Theme/admin.php");
            } elseif($row[0]['role'] == 'admin') {
            $_SESSION['admin'] = $row[0];
            // print_r($_SESSION['admin']);
            header("Location:../Admin-Theme/admin.php");
            }
        } else {
            
            echo "Please Enter Valid Email or password";
        }
    }
}

?>