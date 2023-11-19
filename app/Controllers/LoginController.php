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
}

?>