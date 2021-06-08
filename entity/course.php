<?php
session_start();
include_once('../config/dbconfig.php');

class Course extends ConnectDb {
    // private $admin_id;
    // private $media_id;
    // private $title;
    // private $body;

    public function setCourse($admin_id,$title,$body) {
        $titleCount = strlen($title);
        if($titleCount <= 100) {
            $this->query('INSERT INTO course (admin_id , media_id , title , body) VALUES (:admin_id , (SELECT id FROM media ORDER BY id DESC LIMIT 1 ) , :title , :body)');
            $this->bind(':admin_id',$admin_id);
            $this->bind(':title',$title);
            $this->bind(':body',$body);
            $this->execute();
            $_SESSION['status'] = "Course Created";
        }
    }

    public function getCourse() {
        $this->query('SELECT course.* , media.path ,media.alt_image FROM course INNER JOIN media ON course.media_id = media.id');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }
    public function getCoursePublic() {
        $this->query('SELECT course.* , media.path ,media.alt_image FROM course INNER JOIN media ON course.media_id = media.id ORDER BY id DESC LIMIT 4');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function getCourseById($id){
        $this->query('SELECT course.* , media.title AS imgTitle , media.path,  media.alt_image FROM course INNER JOIN media ON  course.media_id = media.id WHERE course.id = :id');
        $this->bind('id',$id);
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function updateCourse($id,$admin_id,$title,$body) {

        $titleCount = strlen($title);
        if($titleCount <= 100) {
            $this->query('UPDATE course SET     admin_id = :admin_id,
                                                  media_id = (SELECT id FROM media ORDER BY id DESC LIMIT 1 ),
                                                  title = :title,
                                                  body = :body
                                                  WHERE id = :id ');
            $this->bind(':id',$id);
            $this->bind(':admin_id',$admin_id);
            $this->bind(':title',$title);
            $this->bind(':body',$body);
            $this->execute();
            $_SESSION['status'] = "Course Updated";
            // header("Location: ../Admin-Theme/course.php");
        }

    }

    public function updateCourseWithOutImage($id,$admin_id,$title,$body) {

        $titleCount = strlen($title);
        if($titleCount <= 100) {
            $this->query('UPDATE course SET       admin_id = :admin_id,
                                                  title = :title,
                                                  body = :body
                                                  WHERE id = :id ');
            $this->bind(':id',$id);
            $this->bind(':admin_id',$admin_id);
            $this->bind(':title',$title);
            $this->bind(':body',$body);
            $this->execute();
            $_SESSION['status'] = "Course Updated";
            // header("Location: ../Admin-Theme/course.php");
        }

    }

    public function deleteCourse($id){
        $this->query('DELETE FROM course WHERE id = :id');
        $this->bind(':id',$id);
        $this->execute();
        header("Location:../Admin-Theme/course.php");
        $_SESSION['status'] = "Course Deleted";
     }


    
}