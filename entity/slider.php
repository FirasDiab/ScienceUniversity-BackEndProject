<?php
session_start();
include_once('../config/dbconfig.php');
class Slider extends ConnectDb {


    public function setSlider($admin_id,$rank,$body) {
        $record = $this->checkRank($rank);
        if($rank <= 5 && $rank >= 1){
            if(($record[0]['COUNT(id)'] == 0)) {
                $this->query('INSERT INTO slider (admin_id , media_id , rank , body) VALUES (:admin_id , (SELECT id FROM media ORDER BY id DESC LIMIT 1 ) , :rank , :body)');
                $this->bind(':admin_id',$admin_id);
                $this->bind(':rank',$rank);
                $this->bind(':body',$body);
                $this->execute();
                $_SESSION['status'] = "Slider Created";
            } else {
                $this->query('SELECT rank FROM slider');
                $this->execute();
                $row=$this->resultset();
                echo "The Rank Already exist, Rank Exist: ";
                foreach($row as $r){ 
                    echo $r['rank'] . ",";
                }
            }
        } else {
            echo "Rank must be between 1-5";
        }
       

    }

    public function checkRank($rank) {
        
            $this->query('SELECT COUNT(id) FROM slider WHERE rank = :rank');
            $this->bind(':rank',$rank);
            $this->execute();
            $row=$this->resultset();
            return $row;
        } 
        public function checkRank2($rank,$id) {
        
            $this->query('SELECT COUNT(id) FROM slider WHERE rank = :rank AND id <> :id');
            $this->bind(':id',$id);
            $this->bind(':rank',$rank);
            $this->execute();
            $row=$this->resultset();
            return $row;
        } 

    

    public function getSlider() {
        $this->query('SELECT slider.* , media.path , media.title , media.alt_image FROM slider INNER JOIN media ON slider.media_id = media.id');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }
    public function getSliderPublic() {
        $this->query('SELECT slider.* , media.path , media.title , media.alt_image FROM slider INNER JOIN media ON slider.media_id = media.id ORDER BY rank LIMIT 5');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function getSliderById($id){
        $this->query('SELECT slider.* , media.title , media.path,  media.alt_image FROM slider INNER JOIN media ON  slider.media_id = media.id WHERE slider.id = :id');
        $this->bind('id',$id);
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function updateSlider($id,$admin_id,$rank,$body) {

        $record = $this->checkRank2($rank,$id);
        if($rank <= 5 && $rank >= 1){
            if(($record[0]['COUNT(id)'] == 0)) {

                $this->query('UPDATE slider SET  admin_id = :admin_id,
                media_id = (SELECT id FROM media ORDER BY id DESC LIMIT 1 ),
                body = :body,
                rank = :rank
                WHERE id = :id ');
                $this->bind(':id',$id);
                $this->bind(':admin_id',$admin_id);
                $this->bind(':rank',$rank);
                $this->bind(':body',$body);
                $this->execute();
                $_SESSION['status'] = "Slider Updated";
                // header("Location: ../Admin-Theme/slider.php");

            } else {
                $this->query('SELECT rank FROM slider');
                $this->execute();
                $row=$this->resultset();
                echo "The Rank Already exist, Rank Exist: ";
                foreach($row as $r){ 
                    echo $r['rank'] . ",";
                }
            }

        } else {
            echo "Rank must be between 1-5";
        }


    }

    public function updateSliderWithOutImage($id,$admin_id,$rank,$body) {

        $record = $this->checkRank2($rank,$id);
        if($rank <= 5 && $rank >= 1){
            if(($record[0]['COUNT(id)'] == 0)) {

                $this->query('UPDATE slider SET  admin_id = :admin_id,
                body = :body,
                rank = :rank
                WHERE id = :id ');
                $this->bind(':id',$id);
                $this->bind(':admin_id',$admin_id);
                $this->bind(':rank',$rank);
                $this->bind(':body',$body);
                $this->execute();
                $_SESSION['status'] = "Slider Updated";
                // header("Location: ../Admin-Theme/slider.php");

            } else {
                $this->query('SELECT rank FROM slider');
                $this->execute();
                $row=$this->resultset();
                echo "The Rank Already exist, Rank Exist: ";
                foreach($row as $r){ 
                    echo $r['rank'] . ",";
                }
            }

        } else {
            echo "Rank must be between 1-5";
        }

    }

    public function deleteSlider($id){
        $this->query('DELETE FROM slider WHERE id = :id');
        $this->bind(':id',$id);
        $this->execute();
        header("Location:../Admin-Theme/slider.php");
        $_SESSION['status'] = "Slider Deleted";
     }
}


?>