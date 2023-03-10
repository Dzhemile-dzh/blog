<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
class UploadController {
    public $model;
    private $loader;
    private $twig;

    public function __construct() {
        $this->loader = new FilesystemLoader(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view');;
        $this->twig = new Environment($this->loader);
    }

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
        echo $this->twig->render('admin' . DIRECTORY_SEPARATOR . 'add' . DIRECTORY_SEPARATOR . 'addImage.html.twig', array('message' => $message));
    }

    public function editImageAction() {
        $success = false;
        $types = array("main", "secondary");
        if (isset($_POST['submit'])) {
            $id = filter_input(INPUT_POST, 'i_id', FILTER_SANITIZE_NUMBER_INT);
            $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
            $success = $this->model->EditImage($id, $type);
           
        }
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $image = $this->model->SingleImage($getId);
        echo $this->twig->render('admin' . DIRECTORY_SEPARATOR . 'edit' . DIRECTORY_SEPARATOR . 'editImage.html.twig',array('image' => $image, 'types' => $types, 'success' => $success));
    }
        
    public function allImagesAction(){
        $images = $this->model->allImages();
        echo $this->twig->render('admin' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'images.html.twig', array('images' => $images));
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