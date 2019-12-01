<?php

$this->get('/', "StaticMark\Controllers\IndexController@home")->setName('home');
$this->get('/jadi-mastah-php-dengan-membangun-laravel', "StaticMark\Controllers\IndexController@home");
$this->get('/rahasia-membangun-web-aplikasi-yang-mudah-dikelola', "StaticMark\Controllers\IndexController@home");

$this->get(app_env('APP_USERNAME'), "StaticMark\Controllers\IndexController@harrieanto")->setName('creator');
$this->get('blog', "StaticMark\Controllers\IndexController")->setName('blog');
$this->get('blog/page/:digit', "StaticMark\Controllers\IndexController")->setName('blog.page');
$this->get('blog/:alnum', "StaticMark\Controllers\ReadController")->setName('blog.read');
$this->get('blog/tag/:alnum', "StaticMark\Controllers\TagController")->setName('blog.tag');
$this->get('blog/:alnum/:alnum', "StaticMark\Controllers\ReadController")->setName('blog.tag.read');
$this->get('blog/tag/:alnum/page/:digit', "StaticMark\Controllers\TagController")->setName('blog.tag.page');

$this->get('sabun-muka-cyrus', "StaticMark\Controllers\CyrusPageController@index")->setName('cyrus');

$this->group('dashboard', function ($route) {
	$route->get('post', "StaticMark\Controllers\Dashboard\IndexController")->setName('dashboard');
	$route->get('post/page/:digit', "StaticMark\Controllers\Dashboard\IndexController")->setName('dashboard.post.page');
	$route->get('login', "StaticMark\Controllers\Dashboard\LoginController")->setName('login');
	$route->get('logout', "StaticMark\Controllers\Dashboard\LogoutController")->setName('logout');
	$route->post('upload/image', "StaticMark\Controllers\Dashboard\Upload\Image")->setName('dashboard.upload.image');
	$route->post('upload/post', "StaticMark\Controllers\Dashboard\Upload\PostMarkdown")->setName('dashboard.upload.post');
	$route->get('post/delete/:alnum', "StaticMark\Controllers\Dashboard\DeleteController")->setName('dashboard.post.delete');
	
    /**
     * Another solution how to handle middleware
     * -------------------------------------------------------------
     * Here the example you can setup middleware as you needs
     * The following example is how to handle username password auth
     * Before the user can access our credential page
     * When the user was registered and their credential has signed
     * The application then allowing the user to access our credential page
     * With the help of middleware method that require 3(three) argument
     * You must supplied
     */
	$route->middleware('post', 'login', "StaticMark\Middlewares\AuthPasswordMiddleware");
});