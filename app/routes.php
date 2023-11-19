<?php

namespace App\Controllers;
use App\Controllers\LoginController;
use App\Core\Router;


    $router->get('admin', 'LoginController@admin');
    $router->get('admin/login', 'LoginController@view');
    $router->post('admin/logar', 'LoginController@autentica');
    $router->get('admin/logout', 'LoginController@logout');
    

?>