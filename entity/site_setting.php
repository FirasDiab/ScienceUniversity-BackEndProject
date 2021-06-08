<?php
session_start();
include_once('../config/dbconfig.php');

class SiteSet extends ConnectDb {
    

    public function setSettingF($config,$admin_id,$fileDestination) {
        $record = $this->checkFav();
        if($record[0]['COUNT(id)'] == 0) {
            $this->query('INSERT INTO site_setting (admin_id , config_name , config_value) VALUES (:admin_id , :config , :value)');
            $this->bind(':admin_id',$admin_id);
            $this->bind(':config',$config);
            $this->bind(':value',$fileDestination);
            $this->execute();
            $_SESSION['status'] = "Favicon Created";
        } else {
            $this->updateFav($config,$admin_id,$fileDestination);
        }

    }
    public function setSettingC($copyRight,$admin_id,$config) {
        $record = $this->checkCopy();
        if($record[0]['COUNT(id)'] == 0) {
            $this->query('INSERT INTO site_setting (admin_id , config_name , config_value) VALUES (:admin_id , :config , :value)');
            $this->bind(':admin_id',$admin_id);
            $this->bind(':config',$config);
            $this->bind(':value',$copyRight);
            $this->execute();
            $_SESSION['status'] = "CopyRight Created";
        } else {
            $this->updateCopy($copyRight,$admin_id,$config);
        }

    }

    public function checkFav() {
        $this->query("SELECT COUNT(id) FROM site_setting WHERE config_name = 'favicon' ");
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function updateFav($config,$admin_id,$fileDestination) {

        $this->query("UPDATE site_setting SET admin_id = :admin_id,
                                      config_name = :config,
                                      config_value = :value
                                      WHERE config_name = 'favicon' ");
        $this->bind(':admin_id',$admin_id);
        $this->bind(':config',$config);
        $this->bind(':value',$fileDestination);
        $this->execute();
        $_SESSION['status'] = "Favicon Updated";
    }

    public function checkCopy() {
        $this->query("SELECT COUNT(id) FROM site_setting WHERE config_name = 'copyright'");
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function getFav() {
        $this->query("SELECT * FROM site_setting WHERE config_name = 'favicon'");
        $this->execute();
        $row=$this->resultset();
        return $row;
    }
    public function getCopy() {
        $this->query("SELECT * FROM site_setting WHERE config_name = 'copyright'");
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function updateCopy($copyRight,$admin_id,$config) {

        $this->query("UPDATE site_setting SET admin_id = :admin_id,
                                      config_name = :config,
                                      config_value = :value
                                      WHERE config_name = 'copyright' ");
        $this->bind(':admin_id',$admin_id);
        $this->bind(':config',$config);
        $this->bind(':value',$copyRight);
        $this->execute();
        $_SESSION['status'] = "CopyRight Updated";
    }
    
    public function deleteCopy(){
        $this->query("DELETE FROM site_setting WHERE config_name = 'copyright'");
        $this->execute();
        header("Location:../Admin-Theme/site_setting.php");
        $_SESSION['status'] = "CopyRight Deleted";
     }
    public function deleteFav(){
        $this->query("DELETE FROM site_setting WHERE config_name = 'favicon'");
        $this->execute();
        header("Location:../Admin-Theme/site_setting.php");
        $_SESSION['status'] = "Favicon Deleted";
     }
}

?>