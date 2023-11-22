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
    $router->get('posts', 'PaginationController@view');
    $router->get('posts/pvi', 'PostsController@pvi');
    $router->post('posts/search', 'PostsController@search');

    $router->get('admin', 'AdminPostsController@admin');
    $router->get('admin/posts', 'AdminPostsController@postsAdm');
    $router->post('admin/posts/create', 'AdminPostsController@createPosts');
    $router->post('admin/posts/delete', 'AdminPostsController@deletePosts');
    $router->post('admin/posts/update', 'AdminPostsController@editPosts');

    $router->post('perd', 'LoginController@senha');
    $router->post('pass', 'LoginController@pass');

?>