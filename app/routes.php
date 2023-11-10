<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;
use UsuariosController;

    $router->get('', 'ExampleController@index');

    $router->get('users', 'UsuariosController@view');
    $router->post('users/create', 'UsuariosController@createUsers');
?>