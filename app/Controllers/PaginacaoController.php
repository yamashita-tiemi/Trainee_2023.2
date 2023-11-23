<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class PaginationController{

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
        // $posts = App::get('database')->selectAll('posts');
        // $tables = [
        //     'posts'=> $posts,
        // ];

        $qntd_users = 5;
        $start_limit = $qntd_users * $page -  $qntd_users;
        $roust_count = App::get('database')->countAll('users');

        if($start_limit > $roust_count){
            return redirect ('admin/users');
        }

        $users = App::get('database')->pagination('posts', $start_limit, $qntd_users);

        $total_page = ceil($roust_count/ $qntd_users);

        return view('admin/users', compact('users', 'posts', 'page', 'total_page') );
    }
}