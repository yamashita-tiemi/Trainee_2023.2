<?php

namespace App\Controllers;
use App\Controllers\SearchController;
use App\Core\Router;

    $router->post('user/posts/search', 'SearchController@search');
    $router->get('user/posts/show', 'SearchController@view');
?>