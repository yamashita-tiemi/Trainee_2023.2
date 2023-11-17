<?php

namespace App\Controllers;
use App\Controllers\PostsController;
use App\Controllers\AdminPostsController;
use App\Core\Router;


    $router->get('', 'PostsController@landingPage');
    $router->get('posts', 'PostsController@posts');
    $router->get('posts/pvi', 'PostsController@pvi');
    $router->post('posts/search', 'PostsController@search');

    $router->get('loginpage', 'PostsController@loginpage');
    $router->post('login', 'PostsController@login');

    $router->get('admin', 'PostsController@admin');
    $router->get('admin/posts', 'PostsController@postsAdm');
    $router->post('admin/posts/create', 'PostsController@createPosts');
    $router->post('admin/posts/delete', 'PostsController@deletePosts');
    $router->post('admin/posts/update', 'PostsController@editPosts');

?>