<?php
session_start();
include_once('../config/dbconfig.php');
class Achi extends ConnectDb {


    public function setachi($admin_id,$number,$body) {
        $numberCount = strlen($number);
        $bodyCount = strlen($body);
        if($numberCount <= 11 && $bodyCount <= 100) {
            $this->query('INSERT INTO achievement (admin_id , media_id , number , body) VALUES (:admin_id , (SELECT id FROM media ORDER BY id DESC LIMIT 1 ) , :number , :body)');
            $this->bind(':admin_id',$admin_id);
            $this->bind(':number',$number);
            $this->bind(':body',$body);
            $this->execute();
            $_SESSION['status'] = "Achievement Created";
        } else {
            echo "You input Over Max Character";
        }
    }

    public function getAchi() {
        $this->query('SELECT achievement.* , media.path FROM achievement INNER JOIN media ON achievement.media_id = media.id');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function getAchiPublic() {
        $this->query('SELECT achievement.* , media.path FROM achievement INNER JOIN media ON achievement.media_id = media.id LIMIT 3;  ');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function getAchiById($id){
        $this->query('SELECT achievement.* , media.title , media.path,  media.alt_image FROM achievement INNER JOIN media ON  achievement.media_id = media.id WHERE achievement.id = :id');
        $this->bind('id',$id);
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function updateAchi($id,$admin_id,$number,$body) {

        $numberCount = strlen($number);
        $bodyCount = strlen($body);
        if($numberCount <= 11 && $bodyCount <= 100) {
            $this->query('UPDATE achievement SET  admin_id = :admin_id,
                                                  media_id = (SELECT id FROM media ORDER BY id DESC LIMIT 1 ),
                                                  number = :number,
                                                  body = :body
                                                  WHERE id = :id ');
            $this->bind(':id',$id);
            $this->bind(':admin_id',$admin_id);
            $this->bind(':number',$number);
            $this->bind(':body',$body);
            $this->execute();
            $_SESSION['status'] = "Achievement Updated";
            // header("Location: ../Admin-Theme/achievement.php");
        }

    }

    public function updateAchiWithOutImage($id,$admin_id,$number,$body) {

        $numberCount = strlen($number);
        $bodyCount = strlen($body);
        if($numberCount <= 11 && $bodyCount <= 100) {
                    $this->query('UPDATE achievement SET  admin_id = :admin_id,
                                                          number = :number,
                                                          body = :body
                                                          WHERE id = :id ');
                    $this->bind(':id',$id);
                    $this->bind(':admin_id',$admin_id);
                    $this->bind(':number',$number);
                    $this->bind(':body',$body);
                    $this->execute();
                    $_SESSION['status'] = "Achievement Updated";
                    // header("Location: ../Admin-Theme/achievement.php");
        }
    }

    public function deleteAchi($id){
        $this->query('DELETE FROM achievement WHERE id = :id');
        $this->bind(':id',$id);
        $this->execute();
        header("Location:../Admin-Theme/achievement.php");
        $_SESSION['status'] = "Achievement Deleted";
     }
}


?>