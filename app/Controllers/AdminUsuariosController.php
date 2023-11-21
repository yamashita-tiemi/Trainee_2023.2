<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController{

    public function view(){
       

        if(isset($_GET['pagina'])){
            $page = intval($_GET['pagina']);

            if($page<=0){
                return redirect ('admin/users');
            }
        }

        else{
            $_GET['pagina'] = 1;
            $page = 1;
        }

        $users = App::get('database')->selectAll('users');
        $tables = [
            'users'=> $users,
        ];

        $itens_por_pag = 8;
        $start_limit = $itens_por_pag * $page -  $itens_por_pag;
        $roust_count = App::get('database')->CountAll($tables);

        if($start_limit> $roust_count){
            return redirect ('admin/users');
        }

        $total_page = ceil( $roust_count/ $itens_por_pag);



        return view ('admin/users',compact( 'users', 'page', 'total_page') );
        
        return view ('admin/users)', $tables);
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