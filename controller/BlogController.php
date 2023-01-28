<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'validators' . DIRECTORY_SEPARATOR . 'BlogValidator.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BlogController {
    public $model;
    private $twig;
    private $loader;
    private $validator;
    private $types = array("home-decor", "business", "art");

    public function __construct() {
        $this->validator = new BlogValidator();
        $this->loader = new FilesystemLoader(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view');;
        $this->twig = new Environment($this->loader);
    }

    public function addBlogAction() {
        $success = false;
        if (isset($_POST['submit'])) {
            $validatedData = $this->validator->validate(INPUT_POST, true);
            if ($validatedData) {
                $success = $this->model->AddBlog(...$validatedData);
            }
        }
        $images = $this->model->AllImages();
        echo $this->twig->render('admin' . DIRECTORY_SEPARATOR . 'add' . DIRECTORY_SEPARATOR . 'addBlog.html.twig', 
                                  array('types' => $this->types, 'success' => $success, 'images' => $images));
    }

    public function editBlogAction() {
        $success = false;
        if (isset($_POST['submit'])) {
            $validatedData = $this->validator->validate(INPUT_POST);
            if ($validatedData) {
                $success = $this->model->EditBlog(...$validatedData);
            }
        }
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $blog = $this->model->SingleBlog($getId);
        $images = $this->model->AllImages();
        echo $this->twig->render('admin' . DIRECTORY_SEPARATOR . 'edit' . DIRECTORY_SEPARATOR . 'editBlog.html.twig',
                                  array('blog' => $blog, 'types' => $this->types, 'success' => $success, 'images' => $images));
    }

    public function allBlogsAction() {
        $blogs = $this->model->allBlogs();
        echo $this->twig->render('admin' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'blogs.html.twig', 
                                  array('blogs' => $blogs));
    }
    
    public function deleteBlogAction(){
        if(isset($_POST['delete_blog'])) {
            try {
                $id = $_POST['delete_blog'];
                $this->model->DeleteBlog($id);
                $message = "Blog has been successfully deleted!";
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
