<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/mod_ed_posts.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Lista de Posts</title>
</head>
<body id="bodymep">

    <!-- Sobreposição -->
    <div id="overlay" class="overlay" onclick="closeModal()"></div>

    <!-- Modais -->
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
                            <label for="imagempostmep">Imagem:</label>
                            <input class="escolherImg" type="file" name="imagempost" id="imagempostmep<?=$post->id?>" accept="image/*" onchange="previewImagemep(<?=$post->id?>)">
                            <input hidden value="<?=$post->image?>" name="imagem_atual">
                            <br>
                            <img class="imagem-previewmep" id="imagem-previewmep<?=$post->id?>" src="<?=$post->image?>" style="max-width: 300px;">
                            <br>
                            <label for="figurecaption">Legenda:</label>
                            <input type="text" name="figurecaption" id="figurecaption" required value="<?=$post->figurecaption?>">
                        </div>
                    </div>
                    <div class="botoesinferioresmep" style="display: flex; width: 100%; justify-content: center;">
                        <button type="reset">Limpar seções</button>
                        <!--botão de salvar o formulario-->
                        <button id="botaosalvar" type="submit">Salvar</button> 
                    </div>
                </form>
                
            </div>
        </div>
    </div>

</body>
<script src="../../../public/js/postListadm.js"></script>
</html>
