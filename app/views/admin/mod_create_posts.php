<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/mod_create_posts.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- <script src="../../../public/js/postListadm.js"></script> -->
    <script src="../../../public/js/mod_edit_posts.js"></script>
    <title>Lista de Posts</title>
</head>
<body>

    <div id="createModal" class="modal">
        <!--botão de fechar o modal-->
        <button class="Fechar" onclick="closeModal('createModal')"><i class="bi bi-x-lg"></i></button>
        <div class="modal-container-criar">
            <!-- Formulário para criar post -->
            <div class="dados-Criar">

                <form class="CriarPost" method="post" action="/admin/posts/create" enctype="multipart/form-data">
                    <div class="inputsContainer">
                        <div class="left">
                            <h2>Criar um Novo Post</h2>
                            <label for="titulopost">Título:</label>
                            <input type="text" name="titulopost" id="titulopost" required>
                            <br>
                            <label for="conteudopost">Conteúdo:</label>
                            <textarea name="conteudopost" id="conteudopost" required></textarea>
                            <br>
                            <label for="data_criacaopost">Data de Criação:</label>
                            <input type="date" name="data_criacaopost" id="data_criacaopost" required>
                            <br>
                            <label for="autorpost">Autor (Usuário):</label>
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
                        <div class="right">
                            <label for="imagempost">Imagem:</label>
                            <input class="escolherImg" type="file" name="imagempost" id="imagempost" accept="image/*" required onchange="previewImage()">
                            <br>
                            <img id="imagem-preview" src="" style="max-width: 300px;">
                            <br>
                            <label for="figurecaption">Descrição da Imagem:</label>
                            <input type="text" name="figurecaption" id="figurecaption" required>
                        </div>
                    </div>
                    <div style="display: flex; width: 100%; justify-content: center;">
                        <button type="reset">Limpar seções</button>
                        <!--botão de salvar o formulario-->
                        <button type="submit" id="botaosalvar" onclick="confirmarSalvarFormularioposts()" >Salvar</button> 
                    </div>
                </form>
            </div>
             <!--caso queria colocar alguma ilustracao, desenho ou imagem para o design dessa pagina que abre do modal, coloque aqui -->
        </div>
    </div>

</body>
</html>
