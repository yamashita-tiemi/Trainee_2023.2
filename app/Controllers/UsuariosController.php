<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController{

    public function view(){

        return view ('admin/userList');
    }

    public function createUsers(){
        
        $nome = $_POST["username"];
        $email = $_POST["useremail"];
        $senha = $_POST["userpassword"];

        var_dump(compact('nome', 'email', 'senha'));
        App::get('database')->insert('users', compact('nome', 'email', 'senha'));

        return redirect('users');
    }
}

?>