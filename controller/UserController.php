<?php 

class UserController {
    public $model;

    public function checkUserAccess() {
        if (!isset($_COOKIE['user_token'])) {
            require_once('../view/login.php');
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
        return require_once('../view/login.php');
    }

    public function logoutAction() {
        unset($_COOKIE['user_token']);
        return require_once('../view/login.php');
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
        return require_once('../view/register.php');
    }
    
    private function generateToken(){
        return bin2hex(random_bytes(32));
    }
}
    