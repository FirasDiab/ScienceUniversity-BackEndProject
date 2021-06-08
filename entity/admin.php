<?php
session_start();
include_once('../config/dbconfig.php');
class Admin extends ConnectDb {
    private $name;
    private $password;
    private $email;

    public function setAdmin($name , $password , $email , $role) {

        if(strlen($name) < 4 && strlen($password < 8) && strlen($password > 32)) {
            return false;
        } else {
            $this->query('SELECT * FROM admin WHERE email = :email');
            $this->bind(':email',$email);
            $this->execute();
            $row=$this->resultset();
            if((count($row[0]) == 0)){
            $hashed = hash('sha512', $password);
            $this->query('INSERT INTO admin (name , email , password , role ) VALUES (:name , :email ,:password , :role)');
            $this->bind(':name',$name);
            $this->bind(':email',$email);
            $this->bind(':password',$hashed);
            $this->bind(':role',$role);
            $this->execute();
            $_SESSION['status'] = "Admin Added";
            } else {
                echo "This Email is already taken!";
            }
        }

       
    }

    public function getAdmin() {
        $this->query('SELECT * FROM admin');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function getAdminById($id){
        $this->query('SELECT * FROM admin WHERE id =:id');
         $this->bind('id',$id);
         $this->execute();
         $row=$this->resultset();
         return $row;
    }

    public function updateAdmin($id , $name , $password , $email , $role) {

        if(strlen($name) < 4 && strlen($password < 8) && strlen($password > 32)) {
            return false;
        } else {
        $this->query('SELECT * FROM admin WHERE email = :email AND id <> :id');
        $this->bind(':email',$email);
        $this->bind(':id',$id);
        $this->execute();
        $row=$this->resultset();
        if((count($row[0]) == 0)){
        $hashed = hash('sha512', $password);
        $this->query('UPDATE admin SET name = :name,
                                       email = :email,
                                       password = :password,
                                       role = :role
                                       WHERE id = :id ');
        $this->bind(':id',$id);
        $this->bind(':name',$name);
        $this->bind(':email',$email);
        $this->bind(':password',$hashed);
        $this->bind(':role',$role);
        $this->execute();
        $_SESSION['status'] = "Admin Updated";
        // header("Location: ../Admin-Theme/admin.php");
        } else {
            echo "This Email is already taken!";
        }
        }    


    }

    public function deleteAdmin($id){
        $this->query('DELETE FROM admin WHERE id = :id');
        $this->bind(':id',$id);
        $this->execute();
        header("Location:../Admin-Theme/admin.php");
        $_SESSION['status'] = "Admin Deleted";
     }
}


?>