<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('', 'ExampleController@index');

    $router->get('admin', 'ExampleController@view');
    $router->get('admin', 'ExampleController@create');
    $router->get('admin', 'ExampleController@edit');
    $router->get('admin', 'ExampleController@delete');

    $router->get('postListadm', 'ExampleController@postListadm');

?>