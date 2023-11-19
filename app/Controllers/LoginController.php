<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController
{

    public function view()
    {
        session_start();
        return view('site/login');
    }


    public function autentica()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = App::get('database')->autenticar('users', $email, $password);
        
        session_start();
        
        if($id > 0)
        {
            $_SESSION['logado'] = $id;
            return redirect('admin/dashboard');
        }

        $_SESSION['error_message'] = "E-mail ou senha incorretos";
        return redirect('admin/login');
    }


    public function logout()
    {
        session_start();
        unset($_SESSION['logado']);
        return redirect('admin/login');
    }


}

?>