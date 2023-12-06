<?php

session_start();

if (!isset($_SESSION['logado'])) {
    
    redirect('admin/login');
    exit(); 
}

if(isset($_SESSION['email_exist']) && $_SESSION['email_exist'] == true) {
    echo  "<script>alert('Email já existe!');</script>";
    $_SESSION['email_exist'] = false;
}

?>

<?php 

    
    // require_once '../../Controllers/PostsController.php';
    use App\Controllers\UsuariosController;

   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../public/css/userListAdm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
</head>
<body>
        <?php
            require 'sidebar2.html';
        ?>
        <div class="redimensiona" id="redimin" >
    <div class="headerula">
        <h1>Lista de Usuários</h1>
        <button onclick="openModal('createModal')"> <i class="bi bi-person-add"></i> Criar Usuário</button>
    </div>
    <div class="tableconteinerula">
    <table>
    <thead>
        <tr>
            <th class="idula">NUM</th>
            <th>Usuário</th>
            <th>Email</th>
            <th class="actionula">Ações</th>
        </tr>
    </thead>
    <tbody class="tbory">

        <?php if (isset($users) && !empty($users)) : ?>
            <?php foreach ($users as $user) : ?>
                <?php if($user->id == 1) : ?>
                    <tr>
                        <td><?= $cont ?></td>
                        <td><?= $user->name ?></td>
                        <td><?= $user->email ?></td>
                        <td>
                            <button onclick="openModal('viewModal<?= $user->id ?>')"> <i class="bi bi-eye"></i> Visualizar</button>
                            <button class="admin_master"> <i class="bi bi-person-gear"></i> Editar</button>
                            <button class="admin_master"> <i class="bi bi-trash"></i> Deletar</button>
                        </td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td><?= $cont ?></td>
                        <td><?= $user->name ?></td>
                        <td><?= $user->email ?></td>
                        <td>
                            <button onclick="openModal('viewModal<?= $user->id ?>')"> <i class="bi bi-eye"></i> Visualizar</button>
                            <button onclick="openModal('editModal<?= $user->id ?>')"> <i class="bi bi-person-gear"></i> Editar</button>
                            <button onclick="openModal('deleteModal<?= $user->id ?>')"> <i class="bi bi-trash"></i> Deletar</button>
                        </td>
                    </tr>
                <?php endif; ?>

                <!-- Sobreposição -->
                <div id="overlay" class="overlay" onclick="closeModal()"></div>

                <!-- MODAL VISUALIZAR -->
                
                
                <div id="viewModal<?= $user->id ?>" class="viewModal  modal">
                    <button onclick="closeModal('viewModal')" class="fechar"><i class="bi bi-x-lg"></i></button>
                    <div class="modal-container-visualizacao">
                        <div class="dados-visualiz">
                            
                            <h2>Dados do Usuário</h2>
                            <div id="userInfo">
                            <form class="container" action="/admin/users/view" method="GET">
                                <p><strong>Id:</strong> <span id="viewid"><?= $user->id ?></span></p>
                                <p><strong>Nome:</strong> <span id="viewUsername" ><?= $user->name ?></span></p>
                                <p><strong>Email:</strong> <span id="viewUseremail"><?= $user->email ?></span></p>
                                </form>
                            </div>
                        </div>
                        <div class="ilutracao-visualiz">
                            <img src="../../../public/assets/ilustracao-visualiz.png">
                        </div>
                    </div> 
                </div>

                <!-- MODAL EDITAR -->
                
                <div class="modal editModalUser" id="editModal<?= $user->id ?>" >
                    <button onclick="closeModal('editModal<?= $user->id ?>')" class="fechar"><svg xmlns="http://www.w3.org/2000/svg" width="1vw"  fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                      </svg></button>
                      
                    <div class="modal-container-editUser">
                        <div class="ilutracao-edit">
                            <img src="../../../public/assets/img-edit-user-iconn.png">
                        </div>  
                        <div class="dados-editUser">
                            <h2>Editar Informações do Usuário</h2>
                            <form id="edituser<?=$user->id?>" class="edituser" method="post" action="/admin/users/update" enctype="multipart/form-data">
                            <input hidden name="id" value="<?=$user->id?>">
                           
                                <label for="editusername">Novo Nome de Usuário:  </label>
                                <input type="text"placeholder="Nome Sobrenome" id="editusername" name="name" value ="<?=$user->name?>" >
                
                                <label for="edituseremail">Novo Email</label>
                                <input type="email" placeholder="exemplo@email.com" id="edituseremail" name="email" value ="<?=$user->email?>">
                
                                <label for="userpassword">Senha do Usuário</label>
                                <div class="olhinho">
                                    <input type="password" placeholder="********" class="userpasswordnovo" id="userpasswordnovo<?= $user->id ?>" name="password" oninput="inputChanged('userpasswordnovo')">
                                    <i class="bi bi-eye-fill" id="btn-senha-userpasswordnovo" style="display: none;" onclick="mostrarSenha('userpasswordnovo')"></i>
                                </div>
                
                                <label for="passwordconfirm">Confirme a Senha</label>
                                <div class="olhinho">
                                    <input type="password" placeholder="********" class="passwordconfirmnovo" id="passwordconfirmnovo<?= $user->id ?>" name="password" oninput="inputChanged('passwordconfirmnovo')">
                                    <i class="bi bi-eye-fill" id="btn-senha-passwordconfirmnovo" style="display: none;" onclick="mostrarSenha('passwordconfirmnovo')"></i>
                                </div>
                                
                                <button type="reset">Limpar seções</button>
                            </form>
                            
                        </div>
                        
                    </div>
                    
                    <button type="submit" form="edituser<?=$user->id?>" id="botaosalvaredit" onclick='return validaredit("userpasswordnovo<?= $user->id ?>", "passwordconfirmnovo<?= $user->id ?>")' >Salvar</button> 
                </div>

                <!-- MODAL DELETAR -->
                
                <div id="deleteModal<?= $user->id ?>" class="deleteModal modal">
                    <div class="modal-container-delete">
                        <div class="ilutracao">
                            <img src="../../../public/assets/delete-user.jpg">
                        </div>
                
                        <div class="dados-delete">
                            <form class="container" action="/admin/users/delete" method="POST">
                            <input type="hidden" name="id" value="<?= $user->id ?>" >
                                <h2>Deletar Usuário</h2>
                                <!-- Confirmação de exclusão -->
                                <h3>Realmente deseja deletar esse Usuário?</h3>
                                <div class="botoes">
                                    <button type="submit" onsubmit="" ">Confirmar</button>
                                    <button type = "button" onclick="closeModal('deleteModal')">Cancelar</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <?php $cont = $cont + 1; ?>
            <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Nenhum usuário disponível</td>
                </tr>
                <?php endif; ?>
                
                
                
            </tbody>
            <tfoot>
                <tr>
                    </tr>
                </tfoot>
            </table>
            
        </div>

        <!-- MODAL CRIAR -->
        
        <div id="createModal" class="modal createModalUser">
            <button onclick="closeModal('createModal')" class="fechar"><svg xmlns="http://www.w3.org/2000/svg" width="1vw"  fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
              </svg></button>
        
            <div class="modal-container">
                <div class="dados">
                    <h2>Criar Usuário</h2>
                    <form id="criaruser" class="criaruser" method="post" action="/admin/users/create">
                        <label for="username">Nome de Usuário:</label>
                        <input type="text"placeholder="Nome Sobrenome"  id="username" name="name">
                        <label for="useremail">Email do Usuário</label>
                        <input type="email" placeholder="exemplo@email.com" id="useremail"  name="email">
                        <label for="userpassword">Senha do Usuário</label>
                        <div class="olhinho">
                            <input type="password" placeholder="********" id="userpassword" name="password" oninput="inputChanged('userpassword')">
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
        
            <button type="submit" form="criaruser" id="botaosalvar" onclick="return validar()">Salvar</button> 
        </div>
    </div>

    <?php
        require "./app/views/Include/IncludePaginacao.php"
    ?>

    <script src="../../../public/js/userListAdm.js"></script>
</body>
<script>
        const telaEl = document.getElementById("redimin")
        function openModal(modalId) {
            closeModal(); // Fecha qualquer modal aberto antes de abrir outro
            document.getElementById(modalId).style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
    </script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
