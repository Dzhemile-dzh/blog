<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BlogController {
    public $model;
    private $twig;
    private $types = array("home-decor", "business", "art");

    public function __construct() {
        $this->twig = new Environment(new FilesystemLoader('..' . DIRECTORY_SEPARATOR . 'view'));
    }

    public function validateBlog($method, $is_add = false) {
        $id = filter_input($method, 'b_id', FILTER_SANITIZE_NUMBER_INT);
        $title = filter_input($method, 'b_title', FILTER_SANITIZE_SPECIAL_CHARS);
        $body = filter_input($method, 'b_body', FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_input($method, 'b_type', FILTER_SANITIZE_SPECIAL_CHARS);
        $author = filter_input($method, 'b_author', FILTER_SANITIZE_SPECIAL_CHARS);
        $is_active = filter_input($method, 'b_is_active', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        if ($title && $body && $type && $author) {
            if($is_add) {
                return array($title, $body, $type, $author, $is_active);
            } else {
                return array($id, $title, $body, $type, $author, $is_active);
            }
        } else {
            return false;
        }
    }

    public function addBlogAction() {
        if (isset($_POST['submit'])) {
            $validatedData = $this->validateBlog(INPUT_POST, true);
            if ($validatedData) {
                $this->model->AddBlog(...$validatedData);
            }
        }
        echo $this->twig->render('admin' . DIRECTORY_SEPARATOR . 'add' . DIRECTORY_SEPARATOR . 'addBlog.html.twig', array('types' => $this->types));
    }

    public function editBlogAction() {
        if (isset($_POST['submit'])) {
            $validatedData = $this->validateBlog(INPUT_POST);
            if ($validatedData) {
                $this->model->EditBlog(...$validatedData);
            }
        }
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $blog = $this->model->SingleBlog($getId);
        echo $this->twig->render('admin' . DIRECTORY_SEPARATOR . 'edit' . DIRECTORY_SEPARATOR . 'editBlog.html.twig',array('blog' => $blog, 'types' => $this->types));
    }

    public function allBlogsAction() {
        $blogs = $this->model->allBlogs();
        echo $this->twig->render('admin' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'blogs.html.twig', array('blogs' => $blogs));
    }
    
    public function deleteBlogAction(){
        if(isset($_POST['delete_blog'])) {
            try {
                $id = $_POST['delete_blog'];
                $this->model->DeleteBlog($id);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } catch (Exception $e) {
                $message = "Error deleting blog: " . $e->getMessage();
            }
        } else {
            $message = "Record was not deleted! ";
        }
    }
}
