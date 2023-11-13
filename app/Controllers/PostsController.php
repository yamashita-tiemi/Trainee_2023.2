<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

// require_once '../../../core/App.php';

class PostsController
{

    public function view() {
        $posts = App::get('database')->selectAll('posts');

        return view('admin/postListadm', compact('posts'));
    }


    public function createPosts() {
        $parametros = [
            'title' => $_POST['titulopost'],
            'content' => $_POST['conteudopost'],
            'author' => $_POST['autorpost'],
            'created_at' => $_POST['data_criacaopost'],
            'imagempost' => $_POST['imagempost'],
        ];

        App::get('database')->insert('posts', $parametros);

        header('Location: /');
    }


    public function editPosts() {
        $parametros = [
            'titulopost' => $_POST['titulopost'],
            'conteudopost' => $_POST['conteudopost'],
            'autorpost' => $_POST['autorpost'],
            'data_criacaopost' => $_POST['data_criacaopost'],
            'imagempost' => $_POST['imagempost'],
        ];

        App::get('database')-> editPosts('posts', $POST['id'], $parametros);
        header('Location: /admin/postListadm', $tables);
    }


    public function deletePosts() {
        $id= $_POST[$id];
        $posts = App::get('database')->delete('posts', $id);
        $tables = [
            'posts' => $posts,
        ];

        header('Location: /admin/postListadm');
    }


    public function index()
    {
        return view('admin/postListadm');
    }


    public function postList()
    {
        return view('postListadm');
    }
}

?>