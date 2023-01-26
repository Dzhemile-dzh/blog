<?php 
require_once '../vendor/autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class UserController {
    public $model;

    private $loader;
    private $twig;

    public function __construct() {
        $this->loader = new FilesystemLoader('../view');
        $this->twig = new Environment($this->loader);
    }

    public function checkUserAccess() {
        if (!isset($_COOKIE['user_token'])) {
            echo $this->twig->render('login.html.twig');
            exit;
        }
    }

    public function loginAction() {
        if (isset($_POST['LoginSubmit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $checkUserLogin = $this->model->CheckUserLogin($username, $password);

            if ($checkUserLogin == 1) {
                $token = $this->generateToken();
                setcookie('user_token', $token, time()+3600);
                return require_once('../view/admin/dashboard.php');
            }
        }
        echo $this->twig->render('login.html.twig');
    }

    public function logoutAction() {
        unset($_COOKIE['user_token']);
        echo $this->twig->render('login.html.twig');
    }

    public function registerAction() {
        if(isset($_POST['RegisterSubmit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $this->model->UserRegister($username, $password);
            $token = $this->generateToken();
            setcookie('user_token', $token, time()+3600);
            return require_once('../view/admin/dashboard.php');
        }
        echo $this->twig->render('register.html.twig');
    }

    private function generateToken(){
        return bin2hex(random_bytes(32));
    }
}