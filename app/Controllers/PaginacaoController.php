<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController{

    public function view(){
        if(isset($_GET['pagina'])){
            $page = intval($_GET['pagina']);
        }

        if($page<=0){
            return redirect ('site/listas-de-posts');
        }

        $posts = App::get('database')->selectAll('posts');
        $tables = [
            'posts'=> $posts,
        ];

        $itens_por_pag = 6;
        $start_limit = $itens_por_pag * $page -  $itens_por_pag;
        $roust_count = App::get('database')->CountAll($tables);

        if($start_limit> $roust_count){
            return redirect ('admin/userListAdm');
        }

        $total_page = ceil( $roust_count/ $itens_por_pag);

        return view ('site/listas-de-posts',compact( 'users', 'page', 'total_page') );
    }
}