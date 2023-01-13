<?php 

session_start();
class UserController {
    public $model;

    public function checkUserAccess() {

        if (!isset($_SESSION['userLogInStatus'])) {
            require_once('../view/login.php');
            exit;
        }
    }

    public function loginAction() {
        if (isset($_POST['LoginSubmit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $checkUserLogin = $this->model->CheckUserLogin($username, md5($password));

            if ($checkUserLogin == 1) {
                $_SESSION['userLogInStatus'] = 1;
                return require_once('../view/admin/dashboard.php');
            }
        }

        if (!isset($_SESSION['userLogInStatus'])) {
            return require_once('../view/login.php');
        } else {
            return require_once('../view/admin/dashboard.php');
        }
    }

    public function logoutAction() {
        unset($_SESSION['userLogInStatus']);
        return require_once('../view/login.php');
    }

    public function registerAction() {
        if(isset($_POST['RegisterSubmit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->model->UserRegister($username, md5($password));
            $_SESSION['userLogInStatus'] = 1;

        }

        if (!isset($_SESSION['userLogInStatus'])) {
            return require_once('../view/register.php');
        } else {
            return require_once('../view/admin/dashboard.php');
        }
    }
}