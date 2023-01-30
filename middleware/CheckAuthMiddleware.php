<?php
class CheckAuthMiddleware {
    private $controller;

    public function __construct(UserController $controller) {
        $this->controller = $controller;
    }

    public function handle() {
        $this->controller->checkUserAccess();
    }
}