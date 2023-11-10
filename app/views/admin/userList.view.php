<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../public/css/userList.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="../../../public/js/userListAdm.js"></script>
</head>
<body>

    <div class="headerula">
        <button onclick="openModal('createModal')">Criar Usuário</button>
    </div>
    <div class="mainula">
            <div class="grid-item col4">
                <button onclick="openModal('viewModal')">Visualizar</button>
                <button onclick="openModal('editModal')">Editar</button>
                <button onclick="openModal('deleteModal')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                  </svg>    delete</button>
            </div>
        </div>
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
                <form class="criaruser" method="post" action="/users/create" id="createform">
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
        <button type="submit" id="botaosalvar" onclick="confirmarSalvarFormulario()" >Salvar</button> 
<script>
    function enviarFormulario(){
        var formulario=document.getElementById('createform');
        formulario.submit();
    }
</script>

        
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


</body>
</html>