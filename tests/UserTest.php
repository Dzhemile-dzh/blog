<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'UserModel.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'UserController.php';

class UserTest extends TestCase {
    private $controller;

    protected function setUp(): void {
        $this->controller = new UserController();
        $this->controller->model = $this->createMock(UserModel::class);
    }

    protected function tearDown():void {
        unset($this->controller);
    }

    public function testCheckUserAccessRedirectsToLoginPageWhenUserIsNotLoggedIn() {
        $this->expectOutputRegex('/login\.html\.twig/');
        $this->controller->checkUserAccess();
    }

    public function testLoginActionDisplaysIncorrectUsernameOrPasswordWhenLoginFails() {
        $_POST['LoginSubmit'] = true;
        $_POST['username'] = 'invalid_username';
        $_POST['password'] = 'invalid_password';

        $this->controller->model->expects($this->once())
            ->method('CheckUserLogin')
            ->with('invalid_username', 'invalid_password')
            ->willReturn([]);

        $this->expectOutputString('Incorrect username or password');
        $this->controller->loginAction();
    }

    public function testLoginActionRedirectsToDashboardWhenLoginSucceeds() {
        $_POST['LoginSubmit'] = true;
        $_POST['username'] = 'valid_username';
        $_POST['password'] = 'valid_password';

        $this->controller->model->expects($this->once())
            ->method('CheckUserLogin')
            ->with('valid_username', 'valid_password')
            ->willReturn([1]);

        $this->expectOutputRegex('/dashboard\.php/');
        $this->controller->loginAction();

        $this->assertEquals('valid_username', $_SESSION['username']);
    }

    public function testLogoutActionRemovesUsernameFromSessionAndDisplaysLoginPage() {
        $_SESSION['username'] = 'valid_username';

        $this->expectOutputRegex('/login\.html\.twig/');
        $this->controller->logoutAction();

        $this->assertArrayNotHasKey('username', $_SESSION);
    }

    public function testRegisterActionDisplaysRegisterPageWhenNoPostData() {
        $this->expectOutputRegex('/register\.html\.twig/');
        $this->controller->registerAction();
    }

    public function testRegisterActionAddsNewUserAndRedirectsToLoginPage() {
        $_POST['RegisterSubmit'] = true;
        $_POST['username'] = 'new_username';
        $_POST['password'] = 'new_password';

        $this->controller->model->expects($this->once())
            ->method('UserRegister')
            ->with('new_username', 'new_password');

        $this->expectOutputString('New user added!');
        $this->expectOutputRegex('/login\.html\.twig/');
        $this->controller->registerAction();

        $this->assertEquals('new_username', $_SESSION['username']);
    }
}