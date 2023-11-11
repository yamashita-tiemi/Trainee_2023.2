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
        <button onclick="closeModal('createModal')" class="fechar"><svg xmlns="http://www.w3.org/2000/svg" width="1vw"  fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
          </svg></button>

        <div class="modal-container">
            <div class="dados">
                <h2>Criar Usuário</h2>
                <form id="criaruser" class="criaruser" method="post" action="/users/">
                    <label for="username">Nome de Usuário:</label>
                    <input type="text"placeholder="Nome Sobrenome" id="username" name="username">
                    <label for="useremail">Email do Usuário</label>
                    <input type="email" placeholder="exemplo@email.com" id="useremail" name="useremail">
                    <label for="userpassword">Senha do Usuário</label>
                    <div class="olhinho">
                        <input type="password" placeholder="********" id="userpassword" name="userpassword" oninput="inputChanged('userpassword')">
                        <i class="bi bi-eye-fill" id="btn-senha-userpassword" style="display: none;" onclick="mostrarSenha('userpassword')"></i>
                    </div>

                    <label for="passwordconfirm">Confirme a Senha</label>
                    <div class="olhinho">
                        <input type="password" placeholder="********" id="passwordconfirm" name="passwordconfirm" oninput="inputChanged('passwordconfirm')">
                        <i class="bi bi-eye-fill" id="btn-senha-passwordconfirm" style="display: none;" onclick="mostrarSenha('passwordconfirm')"></i>
                    </div>
                    <button type="reset">Limpar seções</button>
                </form> 
            </div>
            <div class="ilutracao">
                <img src="../../../public/assets/ilustracao_user.png">
            </div>
        </div>

        <button form="criaruser" id="botaosalvar" onclick="confirmarSalvarFormulario()" >Salvar</button> 
    </div>

    <div id="viewModal" class="modal">
        <button onclick="closeModal('viewModal')" class="fechar"><i class="bi bi-x-lg"></i></button>
        <div class="modal-container-visualizacao">
            <div class="dados-visualiz">
                <h2>Dados do Usuário</h2>
                <div id="userInfo">
                    <p><strong>Id:</strong> <span id="viewid"></span></p>
                    <p><strong>Nome:</strong> <span id="viewUsername"></span></p>
                    <p><strong>Email:</strong> <span id="viewUseremail"></span></p>
                </div>
            </div>
            <div class="ilutracao-visualiz">
                <img src="../../../public/assets/ilustracao-visualiz.png">
            </div>
        </div> 
    </div>

    <div class="modal" id="editModal">
        <button onclick="closeModal('editModal')" class="fechar"><svg xmlns="http://www.w3.org/2000/svg" width="1vw"  fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
          </svg></button>
          
        <div class="modal-container-edit">
            <div class="ilutracao-edit">
                <img src="../../../public/assets/img-edit-user-iconn.png">
            </div>  
            <div class="dados-edit">
                <h2>Editar Informações do Usuário</h2>
                <form id="edituser" class="edituser" >
                    <label for="editusername">Novo Nome de Usuário:</label>
                    <input type="text"placeholder="Nome Sobrenome" id="editusername" name="editusername">

                    <label for="edituseremail">Novo Email</label>
                    <input type="email" placeholder="exemplo@email.com" id="edituseremail" name="edituseremail">

                    <label for="userpassword">Senha do Usuário</label>
                    <div class="olhinho">
                        <input type="password" placeholder="********" id="userpasswordnovo" name="userpasswordnovo" oninput="inputChanged('userpasswordnovo')">
                        <i class="bi bi-eye-fill" id="btn-senha-userpasswordnovo" style="display: none;" onclick="mostrarSenha('userpasswordnovo')"></i>
                    </div>

                    <label for="passwordconfirm">Confirme a Senha</label>
                    <div class="olhinho">
                        <input type="password" placeholder="********" id="passwordconfirmnovo" name="passwordconfirmnovo" oninput="inputChanged('passwordconfirmnovo')">
                        <i class="bi bi-eye-fill" id="btn-senha-passwordconfirmnovo" style="display: none;" onclick="mostrarSenha('passwordconfirmnovo')"></i>
                    </div>
                    
                    <button type="reset">Limpar seções</button>
                </form>
                
            </div>
            
        </div>
        
        <button form="edituser" id="botaosalvaredit" onclick="confirmarSalvarFormulario()" >Salvar</button> 
    </div>

    <div id="deleteModal" class="modal">
        <div class="modal-container-delete">
            <div class="ilutracao">
                <img src="../../../public/assets/delete-user.jpg">
            </div>

            <div class="dados-delete">
                <h2>Deletar Usuário</h2>
                <!-- Confirmação de exclusão -->
                <h3>Realmente deseja deletar esse Usuário?</h3>
                <div class="botoes">
                    <button onclick="confirmDelete()">Confirmar</button>
                    <button onclick="closeModal('deleteModal')">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../public/js/userListAdm.js"></script>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
