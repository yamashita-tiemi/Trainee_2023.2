<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController{

    public function view(){
        $page = 1;
        $total_page = 5;
        return view ('site/listas-de-posts',compact( 'users', 'page', 'total_page') );
    }
}