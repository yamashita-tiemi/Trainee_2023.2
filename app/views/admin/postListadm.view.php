<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Posts Admin</title>
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