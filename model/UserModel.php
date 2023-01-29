<?php 

class UserModel {
    public $db;

    public function CheckUserLogin($username, $password) {

        $query = "SELECT count(*) FROM user WHERE u_name = :username AND u_password = :password";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    public function UserRegister($username, $password) {
        $query = "INSERT INTO user (u_name, u_password) VALUES (:username, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
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
                   SET u_name = :username, u_password = :password 
                   WHERE u_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function DeleteUser ($id) {
        $query = " DELETE 
                   FROM user 
                   WHERE u_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}
