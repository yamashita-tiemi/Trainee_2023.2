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

        if(isset($_GET['pagina'])){
            $page = intval($_GET['pagina']);
            if($page<=0){
                return redirect ('posts');
            }
        } else {
            $page = 1;
        }

        $itens_por_pag = 6;
        $start_limit = $itens_por_pag * $page -  $itens_por_pag;
        $roust_count = count($posts);

        if($start_limit > $roust_count){
            return redirect ('admin/userListAdm');
        }

        $posts = App::get('database')->pagination('posts', $start_limit, $itens_por_pag);

        $total_page = ceil($roust_count/ $itens_por_pag);

        return view('site/listas-de-posts', compact('users', 'posts', 'page', 'total_page') );
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