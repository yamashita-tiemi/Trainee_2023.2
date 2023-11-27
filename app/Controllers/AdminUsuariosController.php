<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController{

    public function view(){
        $numusers = App::get('database')->countAll('users');

        if(isset($_GET['pagina'])){
            $page = intval($_GET['pagina']);
            if($page<=0){
                return redirect ('admin/users');
            }
        } else {
            $page = 1;
        }

        $users = App::get('database')->selectAll('users');
        $posts = App::get('database')->selectAll('posts');
       
        $qntd_users = 5;
        $start_limit = $qntd_users * $page -  $qntd_users;
        $roust_count = App::get('database')->countAll('users');

        if($start_limit > $roust_count){
            return redirect ('admin/users');
        }

        $users = App::get('database')->paginationAdm('users', $start_limit, $qntd_users);

        $total_page = ceil($roust_count/ $qntd_users);

        $cont = $start_limit + 1;

        return view("admin/user" . "ListAdm", compact('users', 'users', 'page', 'total_page', 'numusers', 'cont') );
    }

    public function createUsers(){

        if ( App::get('database')->verifiesIfEmailAlreadyExists($_POST['email'])) {
            session_start();
            $_SESSION['email_exist'] = true;
            header('Location: /admin/users');
            exit();
        }

        $parmetros = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];
        
        App::get('database')->insert('users', $parmetros);

        return redirect('admin/users');

    }

    public function update ()
    {
        $user = App::get('database')->selectOneUser('users', $_POST['id']);

        if ( App::get('database')->verifiesIfEmailAlreadyExists($_POST['email']) == true && $_POST['email'] != $user['email']) {
            session_start();
            $_SESSION['email_exist'] = true;
            header('Location: /admin/users');
            exit();
        }

        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];

        App::get('database')->edit($_POST['id'], 'users', $parameters);
        return redirect('admin/users');

        
    }

    public function delete()
    {
        
        App::get('database')->deleteUser('users', $_POST['id']);
        return redirect('admin/users');
    }




    private function getUserById($users, $userId)
    {
        foreach ($users as $user) {
            if ($user->id === $userId) {
                return $user;
            }
        }

        return null;
    }

    public function admin(){
       
        return view ('admin/dashboard');
    }


}