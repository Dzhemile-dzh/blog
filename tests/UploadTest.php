<?php
use UploadController;
use PHPUnit\Framework\TestCase;

class UploadTest extends TestCase
{
    public function setUp()
    {
        $this->mockModel = $this->createMock(Model::class);
        $this->controller = new UploadController();
        $this->controller->model = $this->mockModel;
    }

    public function testUploadAction() {
        $mockModel = $this->createMock(Model::class);
        $mockModel->expects($this->once())
            ->method('UploadImage')
            ->with($this->equalTo('test.jpg'), $this->equalTo('test'));
        $controller = new UploadController();
        $controller->model = $mockModel;
        $_POST = [
            'submit' => true,
            'type' => 'test',
        ];
        $_FILES = [
            'uploadFile' => [
                'name' => 'test.jpg',
                'tmp_name' => 'temp/test.jpg',
                'type' => 'image/jpeg',
                'error' => 0,
                'size' => 1000,
            ]
        ];
        $this->assertEquals(require_once('../view/admin/add/addImage.php'), $controller->uploadAction());
    }
}