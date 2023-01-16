<?php
class UploadController {
    public $model;

    public function uploadAction() {
        $message = "";
        if (isset($_POST['submit'])) {
            $type = $_POST['type'];
            $file = $_FILES['uploadFile'];
            if ($this->validateUpload($file)) {
                $fileName = $file['name'];
                $target_file = "./uploads/".basename($fileName);
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    $this->model->uploadImage($fileName, $type);
                    $message = "The file ".htmlspecialchars(basename($fileName))." has been uploaded.";
                } else {
                    $message = "Sorry, there was an error uploading your file.";
                }
            } else {
                $message = "Sorry, only JPG, JPEG, PNG files are allowed.";
            }
        }
        return require_once('../view/admin/add/addImage.php');
    }

    public function editImageAction() {
        if (isset($_POST['submit'])) {
            $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $image = $this->model->SingleImage($getId);
        return require_once('../view/admin/edit/editImage.php');
    }
        
    public function allImagesAction(){
        $images = $this->model->allImages();
        return require_once('../view/admin/pages/images.php');
    }

    private function validateUpload($file) {
        $allowedExtensions = array('jpeg','jpg','png');
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        return in_array($extension, $allowedExtensions);
    }

    public function deleteImageAction(){
        if(isset($_POST['delete_image'])) {
            try {
                $id = $_POST['delete_image'];
                $this->model->DeleteImage($id);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } catch (Exception $e) {
                $message = "Error deleting image: " . $e->getMessage();
            }
        } else {
            $message = "Record was not deleted! ";
        }
    }
}