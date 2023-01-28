<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'BlogModel.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'BlogController.php';

class BlogTest extends TestCase
{
        public $mockModel;
        public $blogController;
        public $types = array("home-decor", "business", "art");
        public $images = array("image1.jpg", "image2.jpg", "image3.jpg");
        
        public function setUp():void
        {
            $this->mockModel = $this->createMock(BlogModel::class);
            $this->blogController = new BlogController();
            $this->blogController->model = $this->mockModel;
        }
        
        public function testAddBlogAction() {
            $this->mockModel->expects($this->once())
                      ->method('AddBlog')
                      ->willReturn(true);
        
            $this->blogController->addBlogAction('Test Blog', 'home-decor', 'Test Blog Description');
        
            $this->assertEquals(true, $this->mockModel->AddBlog('Test Blog', 'home-decor', 'Test Blog Description','Test Author', 1, 14));
        }

        public function testDeleteBlogAction() {
            $this->mockModel->expects($this->once())
                      ->method('DeleteBlog')
                      ->willReturn(true);
        
            $this->blogController->deleteBlogAction(1);
        
            $this->assertEquals(true, $this->mockModel->DeleteBlog(1));
        }
}
