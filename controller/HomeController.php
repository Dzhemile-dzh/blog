<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController extends UserController {
    public $model;
    private $twig;

    public function __construct() {
        $this->twig = new Environment(new FilesystemLoader('..' . DIRECTORY_SEPARATOR . 'view'));
    }

    public function indexAction() {
        $this->checkUserAccess();
        return require_once('..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard.php');
    }

    public function publicAction() {
        $blogs = $this->model->publicBlogs();
        echo $this->twig->render('public.html.twig', array('blogs' => $blogs));
    }
}