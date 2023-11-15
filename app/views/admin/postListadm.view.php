<?php 

    require 'mod_create_posts.php';
    // require_once '../../Controllers/PostsController.php';
    use App\Controllers\PostsController;

    require 'sidebar.html';

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
                                    <form id="deletepost" class="deletePost" method="post" action="admin/posts/delete" enctype="multipart/form-data">
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


                        <div id="editModal<?=$post->id?>" class="modal editmodal">
                            <!--botão de fechar o modal-->
                            <button class="Fechar" onclick="closeModal('createModal')"><i class="bi bi-x-lg"></i></button>
                            <div class="modal-container-edit">
                                <!-- Formulário para criar post -->
                                <div class="dados-edit">

                                    <form class="EditarPost" method="post" action="/admin/posts/update" enctype="multipart/form-data">
                                        <div class="inputsContainermep">
                                            <div class="leftmep">
                                                <h2>Editar Post</h2>
                                                <input hidden name="id" value="<?=$post->id ?>">
                                                <label for="titulopost">Título:</label>
                                                <input type="text" name="titulopost" id="titulopost" required value="<?=$post->title?>">
                                                <br>
                                                <label for="conteudopost">Conteúdo:</label>
                                                <textarea name="conteudopost" id="conteudopost" required><?=$post->content?></textarea>
                                                <br>
                                                <label for="data_criacaopost">Data de Criação:</label>
                                                <input type="date" name="data_criacaopost" id="data_criacaopost" required value="<?=$post->created_at?>">
                                                <br>
                                                <label for="autorpost">Autor:</label>
                                                    <?php if (isset($users) && !empty($users)) : ?>
                                                            <select name="autorpost" required>
                                                                <?php foreach ($users as $user) :?>
                                                                    <option value="<?=$user->id ?>">
                                                                        <?php echo $user->name?>
                                                                    </option>
                                                                <?php endforeach; ?>    
                                                            </select>
                                                    <?php else : ?>
                                                        <option></option>
                                                    <?php endif; ?>
                                                <br>
                                            </div>
                                            <div class="rightmep">
                                                <label for="imagempost">Imagem:</label>
                                                <input class="escolherImg" type="file" name="imagempost" id="imagempost" accept="image/*" onchange="previewImage()" value="<?=$post->image?>">
                                                <br>
                                                <img id="imagem-previewmep" src="" style="max-width: 30vw;">
                                            </div>
                                        </div>
                                        <div class="botoesinferioresmep" style="display: flex; width: 100%; justify-content: center;">
                                            <button type="reset">Limpar seções</button>
                                            <!--botão de salvar o formulario-->
                                            <button id="botaosalvar" type="submit">Salvar</button> 
                                        </div>
                                    </form>
                                </div>
                                <!--caso queria colocar alguma ilustracao, desenho ou imagem para o design dessa pagina que abre do modal, coloque aqui -->
                            </div>
                        </div>


                        <!-- MODAL DE VISUALIZAÇÃO -->


                        <div id="viewModal<?=$post->id?>" class="modal">
                            <button onclick="closeModal('viewModal-post')" class="fechar"><i class="bi bi-x-lg"></i></button>
                            <div class="modal-container-visualizacao-post">
                                <div class="dados-visualiz-post">
                                    <h2>Dados do Post</h2>
                                    <div id="PostInfo">

                                        <p><strong>Id:</strong> <span id="viewid"><?=$post->id ?></span></p>
                                        <p><strong>Titulo:</strong> <span id="viewtitulo"> <?=$post->title ?></span></p>
                                        <p><strong>Conteúdo:</strong> <span id="viewConteudo"> <?=$post->content ?></span></p>
                                        <img id="modalImage" src="<?=$post->image?>" alt="Imagem do Post">
                                        <p><strong>Data de Criação:</strong> <span id="modalDate"> <?=$post->created_at ?></span></p>
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
                                </div>
                                <div class="ilutracao-visualiz-post">
                                    <img src="../../../public/assets/visualiz-post.png">
                                </div>
                            </div> 
                        </div>


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

<script src="../../../public/js/mod_edit_posts.js"></script>

</body>
<script src="../../../public/js/postListadm.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>