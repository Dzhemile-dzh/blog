<?php
require_once '../vendor/autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController extends UserController {
    public $model;
    private $twig;

    public function __construct() {
        $this->twig = new Environment(new FilesystemLoader('../view'));
    }

    public function indexAction() {
        $this->checkUserAccess();
        return require_once('../view/admin/dashboard.php');
    }

    public function publicAction() {
        $blogs = $this->model->publicBlogs();
        echo $this->twig->render('public.html.twig', array('blogs' => $blogs));
    }
}