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

    public function admin() {
        $posts = App::get('database')->selectAll('posts');
        $users = App::get('database')->selectAll('users');

        return view('admin/dashboard', compact('posts'), compact('users'));
    }


    public function createPosts() {
        $caminho_temporario = $_FILES['imagempost']['tmp_name'];
        $nome_original = $_FILES['imagempost']['name'];
        $diretorio_destino = "../../public/images/";
        move_uploaded_file($caminho_temporario, "../../htdocs/Trainee/public/images/" . $nome_original);
        $caminho = $diretorio_destino . $nome_original;
        $parametros = [
            'title' => $_POST['titulopost'],
            'content' => $_POST['conteudopost'],
            'author' => $_POST['autorpost'],
            'created_at' => $_POST['data_criacaopost'],
            'image' => $caminho,
        ];

        App::get('database')->insert('posts', $parametros);

        header('Location: /admin/posts');
    }


    public function editPosts() {
        $caminho_temporario = $_FILES['imagempost']['tmp_name'];
        $nome_original = $_FILES['imagempost']['name'];
        $diretorio_destino = "../../public/images/";
        move_uploaded_file($caminho_temporario, "../../htdocs/Trainee/public/images/" . $nome_original);
        $caminho = $diretorio_destino . $nome_original;

        if (!empty($_FILES['imagempost']['tmp_name'])) {
            $caminho_temporario = $_FILES['imagempost']['tmp_name'];
            $nome_original = $_FILES['imagempost']['name'];
            $diretorio_destino = "../../public/images/";
    
            move_uploaded_file($caminho_temporario, "../../htdocs/Trainee/public/images/" . $nome_original);
    
            $caminho = $diretorio_destino . $nome_original;
        } else {
            $caminho = $_POST['imagem_atual'];
        }

        $parametros = [
            'title' => $_POST['titulopost'],
            'content' => $_POST['conteudopost'],
            'author' => $_POST['autorpost'],
            'created_at' => $_POST['data_criacaopost'],
            'image' => $caminho,
        ];

        App::get('database')-> editPosts('posts', $_POST['id'], $parametros);
        header('Location: /admin/posts');
    }


    public function deletePosts() {
        $id = $_POST['id'];
        App::get('database')->delete('posts', $id);

        header('Location: /admin/posts');
    }

    public function landingPage() {
        $posts = App::get('database')->selectForDate('posts');
        $users = App::get('database')->selectAll('users');

        return view('site/landingPage', compact('posts'), compact('users'));
    }

    public function posts() {
        $posts = App::get('database')->selectAll('posts');
        $users = App::get('database')->selectAll('users');

        return view('site/listas-de-posts', compact('posts'), compact('users'));
    }

    public function search() {
        $palavra_chave = $_POST['search'];
        $posts = App::get('database')->selectForSearch('posts', $palavra_chave);
        $users = App::get('database')->selectAll('users');

        return view('site/listas-de-posts', compact('posts'), compact('users'));
    }

    public function pvi() {
        $id = $_GET['post-id'];
        $posts = App::get('database')->selectOne('posts', $id);
        $users = App::get('database')->selectAll('users');

        return view('site/postIndividual', compact('posts'), compact('users'));
    }

    public function loginpage() {
        $posts = App::get('database')->selectAll('posts');
        $users = App::get('database')->selectAll('users');

        return view('site/login', compact('posts'), compact('users'));
    }

    public function login() {
        $posts = App::get('database')->selectAll('posts');
        $users = App::get('database')->selectAll('users');

        $emaillog = $_POST['emaillogin'];
        $senhalog = $_POST['senhalogin'];

        foreach ($users as $user) {
            if ($user->email === $emaillog && $user->password === $senhalog) {
                header('Location: /admin');
            }

            else {
                echo "Email ou senha incorretos";
                die();
            }
        }
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