<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'UploadModel.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'UploadController.php';

class UploadTest extends TestCase
{
        public $mockModel;
        public $uploadController;
        public $types = array("main", "secondary");
        public $images = array("image1.jpg", "image2.jpg", "image3.jpg");
        
        public function setUp():void
        {
            $this->mockModel = $this->getMockBuilder(UploadModel::class)
                                    ->disableOriginalConstructor()
                                    ->getMock();
            $this->uploadController = new UploadController();
            $this->uploadController->model = $this->mockModel;
        }
        
        public function testUploadAction() {
            $file = array(
                'name' => 'image1.jpg',
                'tmp_name' => './temp/image1.jpg',
                'type' => 'image/jpeg'
            );
            $_POST['type'] = 'main';
            $_FILES['uploadFile'] = $file;
            $this->mockModel->expects($this->once())
                            ->method('uploadImage')
                            ->willReturn(true);
            $this->uploadController->uploadAction();
            $this->assertEquals(true, $this->mockModel->uploadImage('image1.jpg', 'main'));
        }
        
        public function testDeleteImageAction() {
            $id = 1;
            $_POST['delete_image'] = $id;
            $this->mockModel->expects($this->once())
                            ->method('DeleteImage')
                            ->with($id);
            $this->uploadController->deleteImageAction();
        }
}