<?php
class UploadValidator {
    public function validateUpload($file) {
            $allowedExtensions = array('jpeg','jpg','png');
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            return in_array($extension, $allowedExtensions);
    }
}