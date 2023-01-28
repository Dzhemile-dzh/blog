<?php

class BlogValidator {
    public function validate($method, $is_add = false) {
        $id = filter_input($method, 'b_id', FILTER_SANITIZE_NUMBER_INT);
        $title = filter_input($method, 'b_title', FILTER_SANITIZE_SPECIAL_CHARS);
        $body = filter_input($method, 'b_body', FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_input($method, 'b_type', FILTER_SANITIZE_SPECIAL_CHARS);
        $author = filter_input($method, 'b_author', FILTER_SANITIZE_SPECIAL_CHARS);
        $is_active = filter_input($method, 'b_is_active', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        $image_id = filter_input($method, 'b_image_id', FILTER_SANITIZE_NUMBER_INT);
        if ($title && $body && $type && $author) {
            if($is_add) {
                return array($title, $body, $type, $author, $is_active, $image_id);
            } else {
                return array($id, $title, $body, $type, $author, $is_active, $image_id);
            }
        } else {
            return false;
        }
    }
}