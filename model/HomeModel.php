<?php

class HomeModel {
    public $db;

    public function PublicBlogs () {
        $query = " SELECT *
                   FROM blog b
                   join images i
                   on b.b_image_id = i.i_id
                   WHERE b.b_is_active = 1
                   AND i.i_type = 'main'
                   ORDER BY b_date DESC
                   LIMIT 10";
        $stmt = $this->db->query($query)->fetchAll();
        return $stmt;
    }
}