<?php 

class BlogController {
    public $model;

    public function addBlogAction() {
        if (isset($_POST['submit'])) {
            $title = filter_input(INPUT_POST, 'b_title', FILTER_SANITIZE_SPECIAL_CHARS);
            $body = filter_input(INPUT_POST, 'b_body', FILTER_SANITIZE_SPECIAL_CHARS);
            $type = filter_input(INPUT_POST, 'b_type', FILTER_SANITIZE_SPECIAL_CHARS);
            $author = filter_input(INPUT_POST, 'b_author', FILTER_SANITIZE_SPECIAL_CHARS);
            $is_active = filter_input(INPUT_POST, 'b_is_active', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            if ($title && $body && $type && $author) {
                $this->model->AddBlog($title, $body, $type, $author, $is_active);
            } else {
                $message = "An error occured! ";
            }
        }
        return require_once('../view/admin/add/addBlog.php');
    }

    public function allBlogsAction() {
            $blogs = $this->model->allBlogs();
            return require_once('../view/admin/pages/blogs.php');
    }
    
    public function deleteBlogAction(){
        if(isset($_POST['delete_blog'])) {
            try {
                $id = $_POST['delete_blog'];
                $this->model->DeleteBlog($id);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } catch (Exception $e) {
                $message = "Error deleting blog: " . $e->getMessage();
            }
        } else {
            $message = "Record was not deleted! ";
        }
    }
}
