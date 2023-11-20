<?php

namespace App\Controllers;
use App\Controllers\PostsController;
use App\Core\Router;

    $router->get('admin/users', 'UsuariosController@view');
    $router->get('admin/users/view', 'UsuariosController@view');
    $router->post('admin/users/create', 'UsuariosController@createUsers');
    $router->post('admin/users/update', 'UsuariosController@update'); 
    $router->post('admin/users/delete', 'UsuariosController@delete'); 

    $router->get('admin/login', 'LoginController@view');
    $router->post('admin/logar', 'LoginController@autentica');
    $router->get('admin/logout', 'LoginController@logout');

    $router->get('', 'PostsController@landingPage');
    $router->get('posts', 'PostsController@posts');
    $router->get('posts/pvi', 'PostsController@pvi');

    $router->get('admin', 'PostsController@admin');
    $router->get('admin/posts', 'PostsController@view');
    $router->post('admin/posts/create', 'PostsController@createPosts');
    $router->post('admin/posts/delete', 'PostsController@deletePosts');
    $router->post('admin/posts/update', 'PostsController@editPosts');

?>