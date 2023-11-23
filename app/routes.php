<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;
use UsuariosController;

 

    $router->get('admin/users', 'UsuariosController@view');
    $router->get('admin/users/view', 'UsuariosController@view');
    $router->post('admin/users/create', 'UsuariosController@createUsers');
    $router->post('admin/users/update', 'UsuariosController@update'); 
    $router->post('admin/users/delete', 'UsuariosController@delete'); 

    $router->get('admin', 'UsuariosController@admin');
    
    $router->get('posts', 'PaginationController@view');
    

?>