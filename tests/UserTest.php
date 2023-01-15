<?php
use UserController;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function setUp()
    {
        $this->mockModel = $this->createMock(Model::class);
        $this->controller = new UserController();
        $this->controller->model = $this->mockModel;
    }

    public function testLoginAction() {
        $mockModel = $this->createMock(Model::class);
        $mockModel->expects($this->once())
            ->method('CheckUserLogin')
            ->with($this->equalTo('testuser'), $this->equalTo(md5('testpassword')))
            ->willReturn(1);
        $controller = new UserController();
        $controller->model = $mockModel;

        $_POST = [
            'LoginSubmit' => true,
            'username' => 'testuser',
            'password' => 'testpassword',
        ];

        $this->assertEquals(require_once('../view/admin/dashboard.php'), $controller->loginAction());
        $this->assertEquals(1,$_SESSION['userLogInStatus']);
    }
}