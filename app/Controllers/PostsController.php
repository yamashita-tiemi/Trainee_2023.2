<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostsController
{

    public function view() {
        $posts = App::get('database')->selectAll('posts');
        $users = App::get('database')->selectAll('users');

        return view('admin/postListadm', compact('posts'), compact('users'));
    }


    public function createPosts() {
        $parametros = [
            'title' => $_POST['titulopost'],
            'content' => $_POST['conteudopost'],
            'author' => $_POST['autorpost'],
            'created_at' => $_POST['data_criacaopost'],
            // 'imagempost' => $_POST['imagempost'],
        ];

        App::get('database')->insert('posts', $parametros);

        header('Location: /posts');
    }


    public function editPosts() {
        $parametros = [
            'title' => $_POST['titulopost'],
            'content' => $_POST['conteudopost'],
            'author' => $_POST['autorpost'],
            'created_at' => $_POST['data_criacaopost'],
            // 'imagempost' => $_POST['imagempost'],
        ];

        App::get('database')-> editPosts('posts', $_POST['id'], $parametros);
        header('Location: /posts');
    }


    public function deletePosts() {
        $id = $_POST['id'];
        App::get('database')->delete('posts', $id);

        header('Location: /posts');
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