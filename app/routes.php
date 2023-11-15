<?php

namespace App\Controllers;
use App\Controllers\PostsController;
use App\Core\Router;

    // $router->get('', 'PostsController@index');

    // $router->get('admin', 'ExampleController@view');
    // $router->get('admin', 'ExampleController@create');
    // $router->get('admin', 'ExampleController@edit');
    // $router->get('admin', 'ExampleController@delete');

    $router->get('index', 'PostsController@landingPage');

    $router->get('posts', 'PostsController@view');
    $router->post('posts/create', 'PostsController@createPosts');
    $router->post('posts/delete', 'PostsController@deletePosts');
    $router->post('posts/update', 'PostsController@editPosts');

?>