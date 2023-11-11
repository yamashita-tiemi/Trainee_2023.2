<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;
use PostsController;

    $router->get('', 'ExampleController@index');

    // $router->get('admin', 'ExampleController@view');
    // $router->get('admin', 'ExampleController@create');
    // $router->get('admin', 'ExampleController@edit');
    // $router->get('admin', 'ExampleController@delete');

    $router->get('posts', 'PostsController@view');
    $router->post('posts/create', 'PostsController@createPosts');

?>