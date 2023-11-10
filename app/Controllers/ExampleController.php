<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ExampleController
{

    public function view() {
        $posts = App::get('database')->selectAll('postlist');
        $tables = [
            'postlist' => $posts,
        ];

        return view('admin/postListadm', $tables);
    }

    public function create() {
        $parametros [
            'titulopost' => $_POST['titulopost'],
            'conteudopost' => $_POST['conteudopost'],
            'autorpost' => $_POST['autorpost'],
            'data_criacaopost' => $_POST['data_criacaopost'],
            'imagempost' => $_POST['imagempost'],
        ];

        return view('admin/postListadm', $tables);
    }

    public function edit() {
        $parametros [
            'titulopost' => 
            'conteudopost' =>
            'autorpost' =>
            'data_criacaopost' =>
            'imagempost' =>
        ]

        return view('admin/postListadm', $tables);
    }

    public function delete() {
        $posts = App::get('database')->selectAll('postlist');
        $tables = [
            'postlist' => $posts,
        ];

        return view('admin/postListadm', $tables);
    }

    public function index()
    {
        return view('site/index');
    }

    public function postList()
    {
        return view('postListadm');
    }
}

?>