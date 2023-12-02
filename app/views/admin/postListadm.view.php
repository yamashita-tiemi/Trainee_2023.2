<?php

session_start();

if (!isset($_SESSION['logado'])) {
    
    redirect('admin/login');
    exit(); 
}

?>

<?php 

    require 'mod_create_posts.php';
    use App\Controllers\AdminPostsController;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Posts Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/postListAdm.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../public/css/mod_ed_posts.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php 

        require 'sidebar2.html';

    ?>

    <div id="redimin" class="redimensiona">

    <div class="headerula">
        <h1>Lista de Posts</h1>
        <button onclick="openModal('createModal')"> <i class="bi bi-file-plus"></i>  Criar Post</button>
    </div>
    <div class="tableconteinerula">
        <table>
            <thead>
                <tr>
                    <th class="idula">NUM</th>
                    <th>Titulo</th>
                    <th>Criador</th>
                    <th class="actionula">Ações</th>
                </tr>
            </thead>
            <tbody class="tborypla">
                <?php if (isset($posts) && !empty($posts)) : ?>
                        <?php foreach ($posts as $post) : ?>
                            <tr>
                                <td><?=$cont?></td>
                                <td><?=$post->title ?></td>
                                <?php foreach ($users as $user) : ?>
                                    <?php if ($post->author === $user->id) : ?>
                                        <td><?=$user->name ?></td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <td>
                                    <button onclick="openModal('viewModal<?=$post->id?>')"> <i class="bi bi-eye"></i> Visualizar</button>
                                    <button onclick="openModal('editModal<?=$post->id?>')"> <i class="bi bi-pencil-square"></i> Editar</button>
                                    <button onclick="openModal('deleteModal<?=$post->id?>')"> <i class="bi bi-trash"></i> Deletar</button>
                                </td>
                            </tr>

                            <!-- MODAL DE DELETAR -->


                            <div id="deleteModal<?=$post->id?>" class="modal">
                                <div class="modal-container-delete">
                                    <div class="ilutracao">
                                        <img src="../../../public/assets/delete-post.png">
                                    </div>
                                    <div class="modal-container">
                                        <form id="deletepost" class="deletePost" method="post" action="/admin/posts/delete" enctype="multipart/form-data">
                                            <input hidden name="id" value="<?=$post->id ?>">
                                            <h2>Deletar Post</h2>
                                            <!-- Confirmação de exclusão -->
                                            <h3>Realmente deseja deletar esse Post?</h3>
                                            <div class="botoes">
                                                <button type="submit">Confirmar</button>
                                                <button type="button" onclick="closeModal('deleteModal')">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- MODAL DE EDITAR -->

                            <?php 

                                    require 'mod_edit_posts.php'

                            ?>


                            <!-- MODAL DE VISUALIZAÇÃO -->


                            <div id="viewModal<?=$post->id?>" class="modal viewModal">
                                <button onclick="closeModal('viewModal-post')" class="fechar"><i class="bi bi-x-lg"></i></button>
                                <div class="modal-container-visualizacao-post">
                                    <div class="dados-visualiz-post">
                                        
                                        <div id="PostInfo">
                                            <h2>Dados do Post</h2>
                                            <p><strong>Id:</strong> <span id="viewid"><?=$post->id?></span></p>
                                            <strong>Titulo:</strong><p> <span id="viewtitulo"> <?=$post->title ?></span></p>
                                            <strong>Conteúdo:</strong><p> <span id="viewConteudo"> <?=$post->content ?></span></p>
                                            
                                             <strong>Data de Criação:</strong><p> <span id="modalDate"> <?=$post->created_at ?></span></p>
                                            <?php if (isset($users) && !empty($users)) : ?>
                                                    <?php foreach ($users as $user) :?>
                                                        <?php if ($post->author === $user->id) : ?>
                                                            <p><strong>Autor:</strong> <span id="modalAuthor"><?php echo $user->name?></span></p>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                            <?php else : ?>
                                                <p><strong>Autor:</strong> <span id="modalAuthor"></span></p>
                                            <?php endif; ?>

                                        </div>
                                            <img id="modalImage" src="<?=$post->image?>" alt="Imagem do Post">
                                        
                                    </div>
                                </div> 
                            </div>
                            <?php $cont = $cont + 1; ?>
                        <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">Nenhum post disponível</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                </tr>
            </tfoot>
        </table>
    </div>



    <!-- Sobreposição -->
    <div id="overlay" class="overlay" onclick="closeModal()"></div>

    <?php
        require "./app/views/Include/IncludePaginacao.php"
    ?>

</body>

<script>

    const telaEl = document.getElementById("redimin");

</script>

<script src="../../../public/js/mod_edit_posts.js"></script>
<script src="../../../public/js/postListadm.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</html>