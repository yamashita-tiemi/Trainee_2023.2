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

        <?php if (isset($users) && !empty($users)) : ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <button onclick="openModal('viewModal<?= $user->id ?>')"> <i class="bi bi-eye"></i> Visualizar</button>
                        <button onclick="openModal('editModal<?= $user->id ?>')"> <i class="bi bi-person-gear"></i> Editar</button>
                        <button onclick="openModal('deleteModal<?= $user->id ?>')"> <i class="bi bi-trash"></i> Deletar</button>
                    </td>
                </tr>
                <!-- Sobreposição -->
                <div id="overlay" class="overlay" onclick="closeModal()"></div>
                <!-- Modais -->
                
                
                <div id="viewModal<?= $user->id ?>" class="viewModal  modal">
                    <button onclick="closeModal('viewModal')" class="fechar"><i class="bi bi-x-lg"></i></button>
                    <div class="modal-container-visualizacao">
                        <div class="dados-visualiz">
                            
                            <h2>Dados do Usuário</h2>
                            <div id="userInfo">
                            <form class="container" action="users/view" method="GET">
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
                
                <div class="modal editModal" id="editModal<?= $user->id ?>" >
                    <button onclick="closeModal('editModal<?= $user->id ?>')" class="fechar"><svg xmlns="http://www.w3.org/2000/svg" width="1vw"  fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                      </svg></button>
                      
                    <div class="modal-container-edit">
                        <div class="ilutracao-edit">
                            <img src="../../../public/assets/img-edit-user-iconn.png">
                        </div>  
                        <div class="dados-edit">
                            <h2>Editar Informações do Usuário</h2>
                            <form id="edituser<?=$user->id?>" class="edituser" method="post" action="users/update" enctype="multipart/form-data">
                            <input hidden name="id" value="<?=$user->id?>">
                           
                                <label for="editusername">Novo Nome de Usuário:  </label>
                                <input type="text"placeholder="Nome Sobrenome" id="editusername" name="name" value ="<?=$user->name?>" >
                
                                <label for="edituseremail">Novo Email</label>
                                <input type="email" placeholder="exemplo@email.com" id="edituseremail" name="email" value ="<?=$user->email?>">
                
                                <label for="userpassword">Senha do Usuário</label>
                                <div class="olhinho">
                                    <input type="password" placeholder="********" id="userpasswordnovo" name="password" oninput="inputChanged('userpasswordnovo')">
                                    <i class="bi bi-eye-fill" id="btn-senha-userpasswordnovo" style="display: none;" onclick="mostrarSenha('userpasswordnovo')"></i>
                                </div>
                
                                <label for="passwordconfirm">Confirme a Senha</label>
                                <div class="olhinho">
                                    <input type="password" placeholder="********" id="passwordconfirmnovo" name="password" oninput="inputChanged('passwordconfirmnovo')">
                                    <i class="bi bi-eye-fill" id="btn-senha-passwordconfirmnovo" style="display: none;" onclick="mostrarSenha('passwordconfirmnovo')"></i>
                                </div>
                                
                                <button type="reset">Limpar seções</button>
                            </form>
                            
                        </div>
                        
                    </div>
                    
                    <button type="submit" form="edituser<?=$user->id?>" id="botaosalvaredit"  >Salvar</button> 
                </div>
                
                <div id="deleteModal<?= $user->id ?>" class="deleteModal modal">
                    <div class="modal-container-delete">
                        <div class="ilutracao">
                            <img src="../../../public/assets/delete-user.jpg">
                        </div>
                
                        <div class="dados-delete">
                            <form class="container" action="users/delete" method="POST">
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
        
        <div id="createModal" class="modal">
            <button onclick="closeModal('createModal')" class="fechar"><svg xmlns="http://www.w3.org/2000/svg" width="1vw"  fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
              </svg></button>
        
            <div class="modal-container">
                <div class="dados">
                    <h2>Criar Usuário</h2>
                    <form id="criaruser" class="criaruser" method="post" action="/users/create">
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
        
            <button type="submit" form="criaruser" id="botaosalvar" onclick="confirmarSalvarFormulario()" >Salvar</button> 
        </div>

    <script src="../../../public/js/userListAdm.js"></script>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
