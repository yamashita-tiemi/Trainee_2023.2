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
    
    $router->post('login', 'AdminPostsController@login');

    $router->get('admin', 'AdminPostsController@admin');
    $router->get('admin/posts', 'AdminPostsController@postsAdm');
    $router->post('admin/posts/create', 'AdminPostsController@createPosts');
    $router->post('admin/posts/delete', 'AdminPostsController@deletePosts');
    $router->post('admin/posts/update', 'AdminPostsController@editPosts');

?>