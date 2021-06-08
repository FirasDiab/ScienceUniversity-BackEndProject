<?php
session_start();
include_once('../config/dbconfig.php');
class Logo extends ConnectDb {

    public function setLogo($logoAlt , $fileDestination, $admin_id) {

        $record = $this->checkLogo();
        if($record[0]['COUNT(id)'] == 0) {
            $this->query('INSERT INTO logo (admin_id , logo_image , alt_image ) VALUES (:admin_id , :logo , :alt)');
                    $this->bind(':admin_id',$admin_id);
                    $this->bind(':logo',$fileDestination);
                    $this->bind(':alt',$logoAlt);
                    $this->execute();
                    $_SESSION['status'] = "Logo Created";
        } else {
            $this->updateLogo($logoAlt , $fileDestination, $admin_id);
        }
    }

    public function getLogo() {
        $this->query('SELECT * FROM logo');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }
    public function checkLogo() {
        $this->query('SELECT COUNT(id) FROM logo');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function updateLogo($logoAlt , $fileDestination, $admin_id) {

        $this->query('UPDATE logo SET admin_id = :admin_id,
                                      logo_image = :logo,
                                      alt_image = :alt');
        $this->bind(':admin_id',$admin_id);
        $this->bind(':logo',$fileDestination);
        $this->bind(':alt',$logoAlt);
        $this->execute();
        $_SESSION['status'] = "Logo Updated";
    }

    public function deleteLogo(){
        $this->query('DELETE FROM logo');
        $this->execute();
        header("Location:../Admin-Theme/logo.php");
        $_SESSION['status'] = "Logo Deleted";
     }
}


?>