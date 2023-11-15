<?php

namespace App\Controllers;
use App\Controllers\PostsController;
use App\Core\Router;

    // $router->get('', 'PostsController@index');

    // $router->get('admin', 'ExampleController@view');
    // $router->get('admin', 'ExampleController@create');
    // $router->get('admin', 'ExampleController@edit');
    // $router->get('admin', 'ExampleController@delete');

    $router->get('', 'PostsController@landingPage');
    $router->get('posts', 'PostsController@posts');
    $router->get('posts/pvi', 'PostsController@pvi');

    $router->get('loginpage', 'PostsController@loginpage');
    $router->post('login', 'PostsController@login');

    $router->get('admin', 'PostsController@admin');
    $router->get('admin/posts', 'PostsController@view');
    $router->post('admin/posts/create', 'PostsController@createPosts');
    $router->post('admin/posts/delete', 'PostsController@deletePosts');
    $router->post('admin/posts/update', 'PostsController@editPosts');

?>