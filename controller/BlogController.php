<?php 

class BlogController {
    public $model;

    public function addBlogAction() {
        if (isset($_POST['submit'])) {

            $title = $_POST['b_title'];
            $body = $_POST['b_body'];
            $type = $_POST['b_type'];
            $author = $_POST['b_author'];
            $is_active = $_POST['b_is_active'] ?? 0;

            $this->model->AddBlog($title, $body, $type, $author, $is_active);
        }
        return require_once('../view/admin/add/addBlog.php');
    }

    public function allBlogsAction() {
            $blogs = $this->model->allBlogs();
            return require_once('../view/admin/pages/blogs.php');
    }
}
