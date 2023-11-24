<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController{

    public function view(){

        if(isset($_GET['pagina'])){
            $page = intval($_GET['pagina']);
            if($page<=0){
                return redirect ('users');
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
            return redirect ('users');
        }

        $users = App::get('database')->pagination($users, $start_limit, $qntd_users);

        $total_page = ceil($roust_count/ $qntd_users);

        return view("admin/users" . "ListAdm", compact('users', 'posts', 'page', 'total_page') );
    }

    public function createUsers(){

        $parmetros = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        ];
        
        App::get('database')->insert('users', $parmetros);

        return redirect('admin/users');

    }
    public function update ()
    {
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];

        App::get('database')->edit($_POST['id'], 'users', $parameters);
        
        return redirect('admin/users');

        
    }

    public function delete()
    {
        
        App::get('database')->delete('users', $_POST['id']);

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