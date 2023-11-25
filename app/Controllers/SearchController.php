<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class SearchController {

    public function view() {
        return view('site/listas-de-posts');
    }

    public function search() {
        $posts = App::get('database')->selectForSearch($_POST['search']);
        $compactedPosts = compact("posts");
        
        return view('site/listas-de-posts', $compactedPosts);
        /* return header('Location: show?posts='.$posts); */
    }
}
?>