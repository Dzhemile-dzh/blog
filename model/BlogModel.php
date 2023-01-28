<?php

class BlogModel {
    public $db;

    public function AddBlog ($title, $body, $type, $author, $is_active, $image_id) {
        $query =  " INSERT INTO blog (b_title, b_body, b_type, b_author, b_is_active, b_image_id, b_date) 
                    VALUES (:title, :body, :type, :author, :is_active, :image_id, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':body', $body, PDO::PARAM_STR);
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $stmt->bindValue(':is_active', $is_active, PDO::PARAM_INT);
        $stmt->bindValue(':image_id', $image_id, PDO::PARAM_INT);
        $stmt->execute();
        return 1;
    }

    public function EditBlog($id, $title, $body, $type, $author, $is_active, $image_id) {
        $query = " UPDATE blog 
                   SET b_title = :title, b_body = :body, b_type = :type, b_author = :author, b_is_active = :is_active, b_image_id = :image_id, b_date = NOW() 
                   WHERE b_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':body', $body, PDO::PARAM_STR);
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $stmt->bindValue(':is_active', $is_active, PDO::PARAM_INT);
        $stmt->bindValue(':image_id', $image_id, PDO::PARAM_INT);
        $stmt->execute();
        return 1;
    }

    public function AllBlogs () {
        $query = " SELECT *
                   FROM blog
                   ORDER BY b_date DESC";
        $stmt = $this->db->query($query)->fetchAll();
        return $stmt;
    }

    public function SingleBlog ($id) {
        $query = " SELECT *
                   FROM blog
                   WHERE b_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function AllImages () {
        $query = " SELECT *
                   FROM images ";
        $stmt = $this->db->query($query)->fetchAll();
        return $stmt;
    }

    public function DeleteBlog($id) {
        $query = " DELETE FROM blog WHERE b_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}