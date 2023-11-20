<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController{

    public function view(){
        $users = App::get('database')->selectAll('users');
        $tables = [
            'users'=> $users,
        ];

        $page = 1;
        $total_page = 5;
        return view ('admin/userListAdm',compact( 'users', 'page', 'total_page') );
        
        return view ('admin/userListAdm', $tables);
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