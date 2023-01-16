<?php
if (isset($_GET['action'])) {
    $request = $_GET['action'];

    $routes = [
        'home' => "HomeController@indexAction",
        'login' => "UserController@loginAction",
        'logout' => "UserController@logoutAction",
        'register' => "UserController@registerAction",
        'images' => "UploadController@allImagesAction",
        'fileUpload' => "UploadController@uploadAction",
        'deleteImage' => "UploadController@deleteImageAction",
        'blogs' => "BlogController@allBlogsAction",
        'addBlog' => "BlogController@addBlogAction",
        'deleteBlog' => "BlogController@deleteBlogAction"
    ];

    $route = $routes[$request] ?? null;
}