<?php 
require_once '../vendor/autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class BlogController {
    public $model;
    private $loader;
    private $twig;

    public function __construct() {
        $this->loader = new FilesystemLoader('../view');
        $this->twig = new Environment($this->loader);
    }

    public function validateBlog($method) {
        $id = filter_input($method, 'b_id', FILTER_SANITIZE_NUMBER_INT);
        $title = filter_input($method, 'b_title', FILTER_SANITIZE_SPECIAL_CHARS);
        $body = filter_input($method, 'b_body', FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_input($method, 'b_type', FILTER_SANITIZE_SPECIAL_CHARS);
        $author = filter_input($method, 'b_author', FILTER_SANITIZE_SPECIAL_CHARS);
        $is_active = filter_input($method, 'b_is_active', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        if ($title && $body && $type && $author) {
            return array($id, $title, $body, $type, $author, $is_active);
        } else {
            $message = "An error occured! ";
            return false;
        }
    }
    
    public function addBlogAction() {
        $types = array("home-decor", "business", "art");

        if (isset($_POST['submit'])) {
            $validatedData = $this->validateBlog(INPUT_POST);
            if ($validatedData) {
                $this->model->AddBlog(...$validatedData);
            }
        }
        echo $this->twig->render('admin/add/addBlog.html.twig', array('types' => $types));
    }
    
    public function editBlogAction() {
        $types = array("home-decor", "business", "art");
        if (isset($_POST['submit'])) {
            $validatedData = $this->validateBlog(INPUT_POST);
            if ($validatedData) {
                $this->model->EditBlog(...$validatedData);
            }
        }
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $blog = $this->model->SingleBlog($getId);
        echo $this->twig->render('admin/edit/editBlog.html.twig',array('blog' => $blog, 'types' => $types));
    }

    public function allBlogsAction() {
            $blogs = $this->model->allBlogs();
            echo $this->twig->render('admin/pages/blogs.html.twig', array('blogs' => $blogs));
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
