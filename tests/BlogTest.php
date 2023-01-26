<?php
use BlogController;
use PHPUnit\Framework\TestCase;

class BlogTest extends TestCase
{
    public function setUp():void
    {
        $this->mockModel = $this->createMock(Model::class);
        $this->controller = new BlogController();
        $this->controller->model = $this->mockModel;
    
    }

    public function testAddBlogAction() {
  

        $mockModel = $this->createMock(Model::class);

        $mockModel->expects($this->once())
            ->method('AddBlog')
            ->with($this->equalTo('Test Title'), $this->equalTo('Test Body'), $this->equalTo('Test Type'), $this->equalTo('Test Author'), $this->equalTo(0));

        $controller = new BlogController();
        $controller->model = $mockModel;

        $_POST = [
            'submit' => true,
            'b_title' => 'Test Title',
            'b_body' => 'Test Body',
            'b_type' => 'Test Type',
            'b_author' => 'Test Author',
        ];

        $this->assertEquals(require_once('../view/admin/add/addBlog.php'), $controller->addBlogAction());
    }
}