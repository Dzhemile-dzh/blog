<?php 
session_start();

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class UserController {
    public $model;

    private $loader;
    private $twig;

    public function __construct() {
        $this->loader = new FilesystemLoader(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view');;
        $this->twig = new Environment($this->loader);
    }

    public function checkUserAccess() {
        if (!isset($_SESSION['username'])) {
            echo $this->twig->render('login.html.twig');
            exit;
        }
    }

    public function loginAction() {
        if (isset($_POST['LoginSubmit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $user = $this->model->CheckUserLogin($username, $password);
            if (!empty($user)) {
                $_SESSION['username'] = $username;
                return require_once('..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard.php');
            } else {
                echo "Incorrect username or password";
            }
        }
        echo $this->twig->render('login.html.twig');
    }

    public function logoutAction() {
        unset($_SESSION['username']);
        echo $this->twig->render('login.html.twig');
    }

    public function registerAction() {
        if(isset($_POST['RegisterSubmit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $this->model->UserRegister($username, $password);
            $_SESSION['username'] = $username;
            echo "New user added!";
            echo $this->twig->render('login.html.twig');
        } else {
            echo $this->twig->render('register.html.twig');
        }
    }
}