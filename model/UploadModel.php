<?php

class UploadModel {
    public $db;

    public function UploadImage ($fileName, $type) {
        $query =  " INSERT INTO images (i_filename, i_uploaded, i_type) 
                         VALUES ('".$fileName."', NOW(), '".$type."')";
        $stmt = $this->db->query($query);
        return 1;
    }

    public function AllImages () {
        $query = " SELECT *
                   FROM images
                   ORDER BY i_uploaded DESC";
        $stmt = $this->db->query($query)->fetchAll();
        return $stmt;
    }

    public function DeleteImage ($id) {
        $query = " DELETE
                   FROM images
                   WHERE i_id = '$id' ";
        $stmt = $this->db->exec($query);
        return $stmt;
    }
}