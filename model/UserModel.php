<?php 

class UserModel {
    public $db;

    public function CheckUserLogin ($username, $password) {
        $query = " SELECT count(*) 
                   FROM user
                   WHERE u_name = '{$username}' 
                   AND u_password = '{$password}' ";
        $stmt  = $this->db->prepare($query)->execute();
        return $stmt;
    }


    public function UserRegister ($username, $password) {
        $query = " INSERT INTO user (u_name, u_password)
                   VALUES ('".$username."', '".$password."')
        ";
        $stmt = $this->db->query($query);
        return 1;
    }

    public function AllUsers () {
        $query = " SELECT *
                   FROM user ";
        $stmt = $this->db->query($query)->fetchAll();
        return $stmt;
    }

    public function EditUser ($id, $username, $password) {
        $query = " UPDATE user 
                   SET u_name = '".$username."', u_password = '".$password."' 
                   WHERE u_id = '".$id."'";
        $stmt = $this->db->query($query);
        return 1;
    }

    public function DeleteUser ($id) {
        $query = " DELETE 
                   FROM user 
                   WHERE u_id = '".$id."'";
        $stmt = $this->db->query($query);
        return 1;
    }
    
}
