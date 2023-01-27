<?php

class UploadModel {
    public $db;

    public function UploadImage ($fileName, $type) {
        $query = "INSERT INTO images (i_filename, i_uploaded, i_type) 
                        VALUES (:fileName, NOW(), :type)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':fileName' => $fileName, ':type' => $type));
        return 1;
    }

    public function AllImages () {
        $query = " SELECT *
                   FROM images
                   ORDER BY i_uploaded DESC";
        $stmt = $this->db->query($query)->fetchAll();
        return $stmt;
    }

    public function EditImage ($id, $type) {
        $query = " UPDATE images SET i_uploaded = NOW(), i_type = :type WHERE i_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':type' => $type, ':id' => $id));
        return 1;
    } 

    public function SingleImage ($id) {
        $query = "SELECT * FROM images WHERE i_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function DeleteImage ($id) {
        $query = " DELETE
                   FROM images
                   WHERE i_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}