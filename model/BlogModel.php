<?php

class BlogModel {
    public $db;

    public function AddBlog ($title, $body, $type, $author, $is_active) {
        $query =  " INSERT INTO blog (b_title, b_body, b_type, b_author, b_is_active, b_date) 
                    VALUES ('".$title."', '".$body."', '".$type."', '".$author."', '".$is_active."', NOW())";
        $stmt = $this->db->query($query);
        return 1;
    }

    public function EditBlog($id, $title, $body, $type, $author, $is_active) {
        $query = " UPDATE blog 
                   SET b_title = '".$title."', b_body = '".$body."', b_type = '".$type."', b_author = '".$author."', b_is_active = '".$is_active."', b_date = NOW() 
                   WHERE b_id = '".$id."'";
        $stmt = $this->db->query($query);
        return 1;
    }

    public function AllBlogs () {
        $query = " SELECT *
                   FROM blog
                   ORDER BY b_date DESC";
        $stmt = $this->db->query($query)->fetchAll();
        return $stmt;
    }

    public function DeleteBlog($id) {
        $query = " DELETE
                   FROM blog
                   WHERE b_id = '$id' ";
        $stmt = $this->db->exec($query);
        return $stmt;
    }
}