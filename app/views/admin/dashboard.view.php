<?php

require 'sidebar.html';

?>

<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../public/css/dashboard.css">
    </head>

    <body>
        <div class="nav">
            <h1>DASHBOARD</h1>
            <div class="logoutBtn" >
                <h2>Log Out</h2>
                <img src="../../../public/assets/dashboard/🦆 icon _log out_.svg" alt="Log Out">
            </div>
        </div>
        <div class="cards">
            <form id="userlist" action="/admin/users">
                <div onclick="redirect2()">
                    <img src="../../../public/assets/dashboard/🦆 icon _people_.svg" alt="Users">
                    <h2>Gerenciar Usuários</h2>
                </div>
            </form>
            <form id="postlist" action="/admin/posts">
                <div onclick="redirect()">
                    <img src="../../../public/assets/dashboard/🦆 icon _file add_.svg" alt="Posts">
                    <h2>Gerenciar Publicações</h2>
                </div>
            </form>
        </div>
    </body>

    <script>
        function redirect() {
          document.getElementById('postlist').submit();
        }
        function redirect2() {
          document.getElementById('userlist').submit();
        }
    </script>

</html>
