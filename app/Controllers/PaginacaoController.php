<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class PaginationController{

    public function view(){
        if(isset($_GET['pagina'])){
            $page = intval($_GET['pagina']);
            if($page<=0){
                return redirect ('posts');
            }
        } else {
            $page = 1;
        }

        $users = App::get('database')->selectAll('users');
        // $posts = App::get('database')->selectAll('posts');
        // $tables = [
        //     'posts'=> $posts,
        // ];

        $itens_por_pag = 10;
        $start_limit = $itens_por_pag * $page -  $itens_por_pag;
        $roust_count = App::get('database')->countAll('posts');

        if($start_limit > $roust_count){
            return redirect ('admin/userListAdm');
        }

        $posts = App::get('database')->pagination('posts', $start_limit, $itens_por_pag);

        $total_page = ceil($roust_count/ $itens_por_pag);

        return view('site/listas-de-posts', compact('users', 'posts', 'page', 'total_page') );
    }
}