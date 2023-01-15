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
        'blogs' => "BlogController@allBlogsAction",
        'addBlog' => "BlogController@addBlogAction"
    ];

    $route = $routes[$request] ?? null;
}