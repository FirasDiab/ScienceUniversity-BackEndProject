<?php
session_start();
include_once('../config/dbconfig.php');
class News extends ConnectDb {


    public function setNews($title , $body , $date , $admin_id) {
        // private $title;
        // private $body;
        // private $date;
        // private $admin_id;

        $countTitle = strlen($title);
        $date_now = date("y-m-d");
        $td = strtotime($date_now);
        $nd = strtotime($date);

        if($countTitle > 255){
            echo "Title is longer than 255 character";
        } else {
        if ($td <= $nd) {
            $this->query('INSERT INTO news (admin_id , title , body , published) VALUES (:admin_id , :title , :body ,:date)');
            $this->bind(':admin_id',$admin_id);
            $this->bind(':title',$title);
            $this->bind(':body',$body);
            $this->bind(':date',$date);
            $this->execute();
            $_SESSION['status'] = "News Created";
        } else {
            echo 'You Entered Old Date';
        }
        }

    }

    public function getNews() {
        $this->query('SELECT * FROM news');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }
    public function getNewsPublic() {
        $this->query('SELECT * FROM news ORDER BY id DESC LIMIT 3');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function getNewsById($id){
        $this->query('SELECT * FROM news WHERE id =:id');
         $this->bind('id',$id);
         $this->execute();
         $row=$this->resultset();
         return $row;
    }

    public function updateNews($id,$title,$body,$date,$admin_id) {

        $countTitle = strlen($title);
        $date_now = date("y-m-d");
        $td = strtotime($date_now);
        $nd = strtotime($date);

        if($countTitle > 255){
            echo "Title is longer than 255 character";
        } else {
        if ($td <= $nd) {
            $this->query('UPDATE news SET admin_id = :admin_id,
                                            title = :title,
                                            body = :body,
                                            published = :date
                                            WHERE id = :id ');
            $this->bind(':id',$id);
            $this->bind(':admin_id',$admin_id);
            $this->bind(':title',$title);
            $this->bind(':body',$body);
            $this->bind(':date',$date);
            $this->execute();
            $_SESSION['status'] = "News Updated";
            // header("Location: ../Admin-Theme/news.php");
        } else {
            echo 'You Entered Old Date';
        }
        }


    }

    public function deleteNews($id){
        $this->query('DELETE FROM news WHERE id = :id');
        $this->bind(':id',$id);
        $this->execute();
        header("Location:../Admin-Theme/news.php");
        $_SESSION['status'] = "News Deleted";
     }
}


?>