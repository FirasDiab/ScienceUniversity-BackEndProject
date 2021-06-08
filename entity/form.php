<?php
session_start();
include_once('../config/dbconfig.php');

class Form extends ConnectDb {
    
    public function setForm($name  , $mobile , $email , $message) {

        $this->query('INSERT INTO form_submission (full_name  , mobile , email , message_content) VALUES (:name , :mobile, :email , :message)');
        $this->bind(':name',$name);
        $this->bind(':email',$email);
        $this->bind(':mobile',$mobile);
        $this->bind(':message',$message);
        $this->execute();
        $_SESSION['status_public'] = "Message Send, Thanks!";
    }

    public function getForm() {
        $this->query('SELECT * FROM form_submission');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function deleteForm($id){
        $this->query('DELETE FROM form_submission WHERE id = :id');
        $this->bind(':id',$id);
        $this->execute();
        header("Location:../Admin-Theme/form.php");
        $_SESSION['status'] = "Message Deleted";
     }
}

?>