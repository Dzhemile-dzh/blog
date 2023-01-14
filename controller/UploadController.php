<?php
class UploadController {
    public $model;

    public function uploadAction() {
        $message = "";
        if (isset($_POST['submit'])) {
            $type = $_POST['type'];
            $fileName = $_FILES['uploadFile']['name'];
            $target_dir = "./uploads/";
            $target_file = $target_dir.basename($fileName);
            $allowed = array('jpeg','png' ,'jpg'); 
            $ext = pathinfo($fileName, PATHINFO_EXTENSION); 

            if (!in_array($ext,$allowed) ) { 
                     echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            } else {
                $this->model->UploadImage($fileName, $type);
            }

            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) {
                $message = "The file ".htmlspecialchars(basename($fileName))." has been uploaded.";

            } else {
                $message = "Sorry, there was an error!";
            }
        }
        return require_once('../view/admin/add/addImage.php');
    }

    public function allImagesAction(){
        $images = $this->model->allImages();
        return require_once('../view/admin/pages/images.php');
    }

}