<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class AdminPostsController
{

    public function postsAdm() {
        $numposts = App::get('database')->countAll('posts');

        if(isset($_GET['pagina'])){
            $page = intval($_GET['pagina']);
            if($page<=0){
                return redirect ('admin/posts');
            }
        } else {
            $page = 1;
        }

        $users = App::get('database')->selectAll('users');
        $posts = App::get('database')->selectAll('posts');
       
        $qntd_posts = 5;
        $start_limit = $qntd_posts * $page -  $qntd_posts;
        $roust_count = App::get('database')->countAll('posts');

        if($start_limit > $roust_count){
            return redirect ('admin/posts');
        }

        $posts = App::get('database')->paginationAdm('posts', $start_limit, $qntd_posts);

        $total_page = ceil($roust_count/ $qntd_posts);

        $cont = $start_limit + 1;

        return view("admin/post" . "ListAdm", compact('users', 'posts', 'page', 'total_page', 'numposts', 'cont') );
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
            'figurecaption' => $_POST['figurecaption'],
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
            'figurecaption' => $_POST['figurecaption'],
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

}

?>