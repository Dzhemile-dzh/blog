<?php

class HomeController extends UserController {
    public $model;

    public function indexAction() {
        $this->checkUserAccess();
        return require_once('../view/admin/dashboard.php');
    }
}