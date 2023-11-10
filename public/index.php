<?php 

require __DIR__ . '/../vendor/autoload.php'

switch ($_SERVER['PATH_INFO']) {
    case '/posts-list-adm':
        $controlador = new ListarPosts ();
        $controlador->processaRequisicao ();
        break;
    case '/users-list-adm':
        $controlador = new  ();
        $controlador->processaRequisicao ();
        break;
    default:
        echo "Erro 404";
        break;
}