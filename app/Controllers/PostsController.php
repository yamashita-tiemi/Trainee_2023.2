<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

require_once '../../../core/App.php';

class PostsController
{

    public function view() {
        $posts = App::get('database')->selectAll('postlist');
        $tables = [
            'postlist' => $posts,
        ];

        return view('postListadm', $tables);
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
        App::get('database')->insert('posts', compact('titulopost', 'conteudopost', 'autorpost', 'data_criacaopost', 'imagempost'));

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

        return view('admin/postListadm', $tables);
    }

    public function deletePosts() {
        $id= $_POST[$id];
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