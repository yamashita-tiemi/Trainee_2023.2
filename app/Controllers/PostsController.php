<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

require_once '../../../core/App.php';

class PostsController
{

    public function view() {
        $posts = App::get('saltoalto')->selectAll('posts');
        $tables = [
            'posts' => $posts,
        ];

        return view('admin/postListadm', $tables);
    }


    public function createPosts() {
        $parametros = [
            'titulopost' => $_POST['titulopost'],
            'conteudopost' => $_POST['conteudopost'],
            'autorpost' => $_POST['autorpost'],
            'data_criacaopost' => $_POST['data_criacaopost'],
            'imagempost' => $_POST['imagempost'],
        ];

        var_dump(compact('titulopost', 'conteudopost', 'autorpost', 'data_criacaopost', 'imagempost'));
        App::get('saltoalto')->insert('posts', compact('titulopost', 'conteudopost', 'autorpost', 'data_criacaopost', 'imagempost'));

        return redirect('posts');

        return view('admin/postListadm', $tables);
    }


    public function editPosts() {
        $parametros = [
            'titulopost' => $_POST['titulopost'],
            'conteudopost' => $_POST['conteudopost'],
            'autorpost' => $_POST['autorpost'],
            'data_criacaopost' => $_POST['data_criacaopost'],
            'imagempost' => $_POST['imagempost'],
        ];

        App::get('saltoalto')-> editPosts('posts', $POST['id'], $parametros);
        header('Location: /admin/postListadm', $tables);
    }


    public function deletePosts() {
        $id= $_POST[$id];
        $posts = App::get('saltoalto')->delete('posts', $id);
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