<?php 

    require 'mod_create_posts.html';
    // require_once '../../Controllers/PostsController.php';
    use App\Controllers\PostsController;

    $controller = new PostsController();
    $controller->view();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Posts Admin</title>
    <link rel="stylesheet" href="../../../public/css/mod_ed_posts.css">
    <link rel="stylesheet" href="../../../public/css/postListAdm.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="headerula">
        <h1>Lista de Posts</h1>
        <button onclick="openModal('createModal')"> <i class="bi bi-file-plus"></i>  Criar Post</button>
    </div>
    <div class="tableconteinerula">
        <table>
            <thead>
                <tr>
                    <th class="idula">ID</th>
                    <th>Titulo</th>
                    <th>Criador</th>
                    <th class="actionula">Ações</th>
                </tr>
            </thead>
            <tbody class="tborypla">
            <!-- <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>Lorem</td>
                    <td>
                        <button onclick="openModal('viewModal')"> <i class="bi bi-eye"></i> Visualizar</button>
                        <button onclick="openModal('editModal')"> <i class="bi bi-pencil-square"></i> Editar</button>
                        <button onclick="openModal('deleteModal')"> <i class="bi bi-trash"></i> Deletar</button>
                    </td>
                </tr> -->
                <?php if (isset($posts) && !empty($posts)) : ?>
                    <?php foreach ($posts as $post) : ?>
                        <tr>
                            <td><?=$post->id ?></td>
                            <td><?=$post->title ?></td>
                            <td><?=$post->author ?></td>
                            <td>
                                <button onclick="openModal('viewModal')"> <i class="bi bi-eye"></i> Visualizar</button>
                                <button onclick="openModal('editModal')"> <i class="bi bi-pencil-square"></i> Editar</button>
                                <button onclick="openModal('deleteModal')"> <i class="bi bi-trash"></i> Deletar</button>
                            </td>
                        </tr>
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

    <!-- Modais -->
    <div id="editModal" class="modal">
        <!--botão de fechar o modal-->
        <button class="Fechar" onclick="closeModal('createModal')"><i class="bi bi-x-lg"></i></button>
        <div class="modal-container-edit">
            <!-- Formulário para criar post -->
            <div class="dados-edit">

                <form class="EditarPost" method="post" enctype="multipart/form-data">
                    <div class="inputsContainermep">
                        <div class="leftmep">
                            <h2>Editar Post</h2>
                            <label for="titulopost">Título:</label>
                            <input type="text" name="titulopost" id="titulopost" required>
                            <br>
                            <label for="conteudopost">Conteúdo:</label>
                            <textarea name="conteudopost" id="conteudopost" required></textarea>
                            <br>
                            <label for="data_criacaopost">Data de Criação:</label>
                            <input type="date" name="data_criacaopost" id="data_criacaopost" required>
                            <br>
                            <label for="autorpost">Autor:</label>
                            <input type="text" name="autorpost" id="autorpost" required>
                            <br>
                        </div>
                        <div class="rightmep">
                            <label for="imagempost">Imagem:</label>
                            <input class="escolherImg" type="file" name="imagempost" id="imagempost" accept="image/*" onchange="previewImage()">
                            <br>
                            <img id="imagem-previewmep" src="" style="max-width: 30vw;">
                        </div>
                    </div>
                    <div class="botoesinferioresmep" style="display: flex; width: 100%; justify-content: center;">
                        <button type="reset">Limpar seções</button>
                        <!--botão de salvar o formulario-->
                        <button id="botaosalvar" onclick="confirmarSalvarFormularioposts()" >Salvar</button> 
                    </div>
                </form>
            </div>
             <!--caso queria colocar alguma ilustracao, desenho ou imagem para o design dessa pagina que abre do modal, coloque aqui -->
        </div>
    </div>

<script src="../../../public/js/mod_edit_posts.js"></script>

    <div id="viewModal" class="modal">
        <div class="modal-container">
            <h2>Visualizar Post</h2>
            <!-- Lista de posts -->
            <button onclick="closeModal('viewModal')">Fechar</button>
        </div>
    </div>

    <div id="deleteModal" class="modal">
        <div class="modal-container">
            <h2>Deletar Post</h2>
            <!-- Confirmação de exclusão -->
            <h3>Realmente deseja deletar esse Post?</h3>
            <button onclick="confirmDelete()">Confirmar</button>
            <button onclick="closeModal('deleteModal')">Cancelar</button>
        </div>
    </div>

</body>
<script src="../../../public/js/postListadm.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>