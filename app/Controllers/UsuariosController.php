<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController{

    public function view(){
        $users = App::get('database')->selectAll('users');
        $tables = [
            'userListAdm'=> $users,
        ];
        return view ('admin/userListAdm', $tables);
    }

    public function createUsers(){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        
        App::get('database')->insert('users', compact('name', 'email', 'password'));

        return redirect('users');

    }

    
}