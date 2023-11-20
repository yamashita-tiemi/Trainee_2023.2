<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostsController
{

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