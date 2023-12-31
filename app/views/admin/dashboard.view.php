<?php

session_start();

if (!isset($_SESSION['logado'])) {
    
    redirect('admin/login');
    exit(); 
}

?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/dashboard.css">
</head>

<body>

    <?php
            require 'sidebar2.html';
        ?>
    <div class="redimensiona" id="redimin">
        <div class="nav">
            <h1>DASHBOARD</h1>
            <a href="/admin/logout" class="logoutBtn">
                <h2>Log Out</h2>
                <img src="../../../public/assets/dashboard/🦆 icon _log out_.svg" alt="Log Out">
            </a>
        </div>
        <div class="cards">
            <a href="/admin/users">
                <div>
                    <img src="../../../public/assets/dashboard/🦆 icon _people_.svg" alt="Users">
                    <h2>Gerenciar Usuários</h2>
                </div>
            </a>
            <a href="/admin/posts">
                <div>
                    <img src="../../../public/assets/dashboard/🦆 icon _file add_.svg" alt="Posts">
                    <h2>Gerenciar Publicações</h2>
                </div>
            </a>
        </div>
    </div>
</body>
<script>
    const telaEl = document.getElementById("redimin")
</script>

</html>