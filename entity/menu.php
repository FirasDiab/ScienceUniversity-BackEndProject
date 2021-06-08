<?php
include_once('../config/dbconfig.php');

class Menu extends ConnectDb {
    public function setMenu($title  , $path , $type , $body, $admin_id,$parent_id) {

        $this->query('INSERT INTO menu_link (parent_id , admin_id, title , path , type , body ) VALUES (:parent_id, :admin_id ,:title , :path , :type, :body)');
            $this->bind(':title',$title);
            $this->bind(':path',$path);
            $this->bind(':type',$type);
            $this->bind(':body',$body);
            $this->bind(':admin_id',$admin_id);
            $this->bind(':parent_id',$parent_id);
            $this->execute();
            $_SESSION['status'] = "Menu Created";

    }

    public function checkMenu($title  , $path , $type , $body, $admin_id,$sub_header,$sub_footer) {
        if($type != '') {
            if(($sub_header != '') && ($sub_footer != '')) {
                echo "Choose One of Header or Footer";
            } elseif (($sub_header == '') && ($sub_footer == '')) {
                if($type == 'header'){
                    $parent_id = 1;
                } elseif ($type == 'footer') {
                    $parent_id = 2;
                }
                $this->setMenu($title  , $path , $type , $body, $admin_id,$parent_id);
                
            } elseif(($sub_header != '') && ($sub_footer == '') && ($type == 'header')) {
                $parent_id = $sub_header;
                $this->setMenu($title  , $path , $type , $body, $admin_id,$parent_id);
            }
            elseif(($sub_header == '') && ($sub_footer != '') && ($type == 'footer')) {
                $parent_id = $sub_footer;
                $this->setMenu($title  , $path , $type , $body, $admin_id,$parent_id);
            } else {
                echo "Wrong Input";
            }
        } else {
            echo "You Must Choose Header Or Footer";
        }
    }

    public function getMenuHeader() {
        $this->query('SELECT * FROM menu_link WHERE id <> 1 AND parent_id = 1');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }
    public function getMenuHeaderPublic() {
        $this->query('SELECT * FROM menu_link WHERE id <> 1 AND parent_id = 1 ORDER BY id LIMIT 6');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function getMenuFooter() {
        $this->query('SELECT * FROM menu_link WHERE id <> 2 AND parent_id = 2');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }
    public function getMenuFooterPublic() {
        $this->query('SELECT * FROM menu_link WHERE id <> 2 AND parent_id = 2 ORDER BY id LIMIT 4');
        $this->execute();
        $row=$this->resultset();
        return $row;
    }
    public function getSubMenuFooter($id) {
        $this->query('SELECT * FROM menu_link WHERE id <> 2 AND parent_id = :id');
        $this->bind(':id',$id);
        $this->execute();
        $row=$this->resultset();
        return $row;
    }

    public function countSub($id) {
        $this->query('SELECT COUNT(id) FROM menu_link WHERE id <> 2 AND parent_id = :id');
        $this->bind(':id',$id);
        $this->execute();
        $row=$this->resultset();
        return $row;
    }
}


?>