<?php
include_once('../config/dbconfig.php');
class Media extends ConnectDb {

    public function setMedia($alt , $fileDestination, $titleImg) {

        $altCount = strlen($alt);
        $titleCount = strlen($titleImg);
        if($altCount <= 100 && $titleCount <= 100) {
            $this->query('INSERT INTO media (title ,  path , alt_image ) VALUES (:title , :path , :alt)');
                    $this->bind(':title',$titleImg);
                    $this->bind(':path',$fileDestination);
                    $this->bind(':alt',$alt);
                    $this->execute();
        }

    }

    public function getLogo() {
        $this->query('SELECT * FROM logo');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function getMediaById($m_id){
        $this->query('SELECT * FROM media WHERE id =:id');
         $this->bind('id',$m_id);
         $this->execute();
         $row=$this->resultset();
         return $row;
    }

    public function updateMedia($media_id,$alt, $titleImg) {
        $altCount = strlen($alt);
        $titleCount = strlen($titleImg);
        if($altCount <= 100 && $titleCount <= 100) {
            $this->query('UPDATE media SET title = :titleImg,
                                           alt_image = :alt
                                           WHERE id = :media_id');
            $this->bind(':media_id',$media_id);
            $this->bind(':alt',$alt);
            $this->bind(':titleImg',$titleImg);
            $this->execute();
        }

    }

    public function deleteLogo(){
        $this->query('DELETE FROM logo');
        $this->execute();
        header("Location:../Admin-Theme/logo.php");
     }
}


?>