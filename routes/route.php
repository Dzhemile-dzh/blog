<?php
if (isset($_GET['action'])) {
    $request = $_GET['action'];

    $routes = [
        'home' => "HomeController@indexAction",
        'public' => "HomeController@publicAction",
        'login' => "UserController@loginAction",
        'logout' => "UserController@logoutAction",
        'register' => "UserController@registerAction",
        'images' => "UploadController@allImagesAction",
        'fileUpload' => "UploadController@uploadAction",
        'editImage' => "UploadController@editImageAction",
        'deleteImage' => "UploadController@deleteImageAction",
        'blogs' => "BlogController@allBlogsAction",
        'addBlog' => "BlogController@addBlogAction",
        'editBlog' => "BlogController@editBlogAction",
        'deleteBlog' => "BlogController@deleteBlogAction"
    ];

    $route = $routes[$request] ?? null;
}