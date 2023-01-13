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
}