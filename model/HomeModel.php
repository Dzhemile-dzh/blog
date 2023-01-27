<?php

class HomeModel {
    public $db;

    public function PublicBlogs () {
        $query = " SELECT *
                   FROM blog b
                   JOIN images i ON b.b_image_id = i.i_id
                   WHERE b.b_is_active = :is_active
                   AND i.i_type = :image_type
                   ORDER BY b_date DESC
                   LIMIT :limit";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':is_active', 1, PDO::PARAM_INT);
        $stmt->bindValue(':image_type', 'main', PDO::PARAM_STR);
        $stmt->bindValue(':limit', 10, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}