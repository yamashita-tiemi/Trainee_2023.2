<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="../../../public/css/userListAdm.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="headerula">
        <h1>Lista de Usuários</h1>
        <button onclick="openModal('createModal')"> <i class="bi bi-person-add"></i> Criar Usuário</button>
    </div>
    <div class="tableconteinerula">
        <table>
            <thead>
                <tr>
                    <th class="idula">ID</th>
                    <th>Usuário</th>
                    <th>Email</th>
                    <th class="actionula">Ações</th>
                </tr>
            </thead>
            <tbody class="tbory">
                <tr>
                    <td>01</td>
                    <td>Lorem</td>
                    <td>ipsum@saltoalto.com</td>
                    <td>
                        <button onclick="openModal('viewModal')"> <i class="bi bi-eye"></i> Visualizar</button>
                        <button onclick="openModal('editModal')"> <i class="bi bi-person-gear"></i> Editar</button>
                        <button onclick="openModal('deleteModal')"> <i class="bi bi-trash"></i> Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Lorem</td>
                    <td>ipsum@saltoalto.com</td>
                    <td>
                        <button onclick="openModal('viewModal')"> <i class="bi bi-eye"></i> Visualizar</button>
                        <button onclick="openModal('editModal')"> <i class="bi bi-person-gear"></i> Editar</button>
                        <button onclick="openModal('deleteModal')">  <i class="bi bi-trash"></i> Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>03</td>
                    <td>Lorem</td>
                    <td>ipsum@saltoalto.com</td>
                    <td>
                        <button onclick="openModal('viewModal')"> <i class="bi bi-eye"></i> Visualizar</button>
                        <button onclick="openModal('editModal')"> <i class="bi bi-person-gear"></i> Editar</button>
                        <button onclick="openModal('deleteModal')"> <i class="bi bi-trash"></i> Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>04</td>
                    <td>Lorem</td>
                    <td>ipsum@saltoalto.com</td>
                    <td>
                        <button onclick="openModal('viewModal')"> <i class="bi bi-eye"></i> Visualizar</button>
                        <button onclick="openModal('editModal')"><i class="bi bi-person-gear"></i> Editar</button>
                        <button onclick="openModal('deleteModal')"> <i class="bi bi-trash"></i> Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>05</td>
                    <td>Lorem</td>
                    <td>ipsum@saltoalto.com</td>
                    <td>
                        <button onclick="openModal('viewModal')"> <i class="bi bi-eye"></i> Visualizar</button>
                        <button onclick="openModal('editModal')"><i class="bi bi-person-gear"></i> Editar</button>
                        <button onclick="openModal('deleteModal')"> <i class="bi bi-trash"></i> Deletar</button>
                    </td>
                    <tr>
                        <td>06</td>
                        <td>Lorem</td>
                        <td>ipsum@saltoalto.com</td>
                        <td>
                            <button onclick="openModal('viewModal')"> <i class="bi bi-eye"></i> Visualizar </button>
                            <button onclick="openModal('editModal')"><i class="bi bi-person-gear"></i> Editar </button>
                            <button onclick="openModal('deleteModal')"> <i class="bi bi-trash"></i> Deletar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>07</td>
                        <td>Lorem</td>
                        <td>ipsum@saltoalto.com</td>
                        <td>
                            <button onclick="openModal('viewModal')"> <i class="bi bi-eye"></i> Visualizar </button>
                            <button onclick="openModal('editModal')"><i class="bi bi-person-gear"></i> Editar </button>
                            <button onclick="openModal('deleteModal')"> <i class="bi bi-trash"></i> Deletar</button>
                        </td>
                    </tr>
                </tr>
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
    <div id="createModal" class="modal">
        <div class="modal-container">
            <h2>Criar Usuário</h2>
            <form class="criaruser" action="/users/create" method="post">
                <label for="username">Nome de Usuário:</label>
                <input type="text" id="username" name="username">
                <label for="useremail">Email do Usuário</label>
                <input type="email" id="useremail" name="useremail">
                <label for="userpassword">Senha do Usuário</label>
                <input type="password" id="userpassword" name="userpassword">
            </form>
            <button type="submit" onclick="closeModal('createModal')">Fechar</button>
        </div>
    </div>

    <div id="viewModal" class="modal">
        <div class="modal-container">
            <h2>Visualizar Usuário</h2>
            <!-- Lista de posts -->
            <button onclick="closeModal('viewModal')">Fechar</button>
        </div>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-container">
            <h2>Editar Usuário</h2>
            <!-- Formulário para editar post -->
            <button onclick="closeModal('editModal')">Fechar</button>
        </div>
    </div>

    <div id="deleteModal" class="modal">
        <div class="modal-container">
            <h2>Deletar Usuário</h2>
            <!-- Confirmação de exclusão -->
            <h3>Realmente deseja deletar esse Usuário?</h3>
            <button onclick="confirmDelete()">Confirmar</button>
            <button onclick="closeModal('deleteModal')">Cancelar</button>
        </div>
    </div>

</body>
<script src="../../../public/js/userListAdm.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>