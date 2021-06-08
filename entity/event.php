<?php
session_start();
include_once('../config/dbconfig.php');
class Event extends ConnectDb {


    public function setEvent($admin_id,$title,$body,$STime,$ETime,$date,$location) {
        $this->query('INSERT INTO event (admin_id , media_id , title , body, start_event_time , end_event_time, date , event_location) VALUES (:admin_id , (SELECT id FROM media ORDER BY id DESC LIMIT 1 ) , :title , :body , :STime , :ETime , :date , :location)');
        $this->bind(':admin_id',$admin_id);
        $this->bind(':title',$title);
        $this->bind(':body',$body);
        $this->bind(':STime',$STime);
        $this->bind(':ETime',$ETime);
        $this->bind(':date',$date);
        $this->bind(':location',$location);
        $this->execute();
        $_SESSION['status'] = "Event Created";
    }

    public function getEvent() {
        $this->query('SELECT event.* , media.path FROM event INNER JOIN media ON event.media_id = media.id');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }
    public function getEventPublic() {
        $this->query('SELECT event.* , media.path FROM event INNER JOIN media ON event.media_id = media.id ORDER BY id DESC LIMIT 3');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function getEventById($id){
        $this->query('SELECT event.* , media.title AS imgTitle , media.path,  media.alt_image FROM event INNER JOIN media ON  event.media_id = media.id WHERE event.id = :id');
        $this->bind('id',$id);
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function updateEvent($id,$admin_id,$title,$body,$STime,$ETime,$date,$location) {

        $this->query('UPDATE event SET  admin_id              = :admin_id,
                                              media_id              = (SELECT id FROM media ORDER BY id DESC LIMIT 1 ),
                                              title                 = :title,
                                              body                  = :body,
                                              start_event_time      = :STime,
                                              end_event_time        = :ETime,
                                              date                  = :date,
                                              event_location        = :location
                                              WHERE id = :id ');
        $this->bind(':id',$id);
        $this->bind(':admin_id',$admin_id);
        $this->bind(':title',$title);
        $this->bind(':body',$body);
        $this->bind(':STime',$STime);
        $this->bind(':ETime',$ETime);
        $this->bind(':date',$date);
        $this->bind(':location',$location);
        $this->execute();
        $_SESSION['status'] = "Event Updated";
        // header("Location: ../Admin-Theme/event.php");
    }

    public function updateEventWithOutImage($id,$admin_id,$title,$body,$STime,$ETime,$date,$location) {

        $this->query('UPDATE event SET  admin_id = :admin_id,
                                              title                 = :title,
                                              body                  = :body,
                                              start_event_time      = :STime,
                                              end_event_time        = :ETime,
                                              date                  = :date,
                                              event_location        = :location
                                              WHERE id = :id ');
        $this->bind(':id',$id);
        $this->bind(':admin_id',$admin_id);
        $this->bind(':title',$title);
        $this->bind(':body',$body);
        $this->bind(':STime',$STime);
        $this->bind(':ETime',$ETime);
        $this->bind(':date',$date);
        $this->bind(':location',$location);
        $this->execute();
        $_SESSION['status'] = "Event Updated";
        // header("Location: ../Admin-Theme/event.php");
    }

    public function deleteEvent($id){
        $this->query('DELETE FROM event WHERE id = :id');
        $this->bind(':id',$id);
        $this->execute();
        header("Location:../Admin-Theme/event.php");
        $_SESSION['status'] = "Event Deleted";
     }
}


?>