function openModal(modalId) {
    closeModal(); // Fecha qualquer modal aberto antes de abrir outro
    document.getElementById(modalId).style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeModal(modalId) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.style.display = 'none';
    });
    document.getElementById('overlay').style.display = 'none';
}

function confirmarSalvarFormulario() {
    var mensagem = "Você tem certeza de que deseja salvar o formulário?";
    if (window.confirm(mensagem)) {
        // Coletar os dados do formulário
        var username = document.getElementById("username").value;
        var useremail = document.getElementById("useremail").value;
        var userpassword = document.getElementById("userpassword").value;
        var userpasswordconfirm = document.getElementById("userpasswordconfirm").value;

        // Valide os dados do formulário, se necessário

        // Enviar os dados para onde você precisar (por exemplo, usando uma solicitação AJAX)
        // Aqui você pode enviar os dados para o seu servidor ou realizar ações necessárias.

        // Após a conclusão, você pode fechar o modal
        closeModal('createModal');
    }
}

function mostrarSenha(inputId) {
    var inputPass = document.getElementById(inputId);
    var btnShowPass = document.getElementById(`btn-senha-${inputId}`);

    if (inputPass.type == "password") {
        inputPass.setAttribute("type", "text");
        btnShowPass.classList.replace("bi-eye-fill", "bi-eye-slash-fill");
    } else {
        inputPass.setAttribute("type", "password");
        btnShowPass.classList.replace("bi-eye-slash-fill", "bi-eye-fill");
    }
}

function inputChanged(inputId) {
    var input = document.getElementById(inputId);
    var btnShowPass = document.getElementById(`btn-senha-${inputId}`);

    if (input.value) {
        btnShowPass.style.display = "block";
        
    } else {
        btnShowPass.style.display = "none";
    }
}

function validar() {
    var senha = document.getElementById("userpassword").value;
    var confirm_senha = document.getElementById("passwordconfirm").value;

    if (senha == "" || senha.length <= 5) {
        alert("Preencha o campo senha com no mínimo 6 caracteres");
        document.getElementById("userpassword").focus();
        return false;
    }

    if (senha != confirm_senha) {
        alert("Senhas diferentes");
        document.getElementById("passwordconfirm").focus();
        return false;
    }

    return true; // Retornará true se a validação passar e o formulário será enviado
}


function validaredit(senhaid, novaid) {
    var senha = document.getElementById(senhaid).value;
    var confirm_senha = document.getElementById(novaid).value;

    if (senha == "" || senha.length <= 5) {
        alert("Preencha o campo senha com no mínimo 6 caracteres");
        document.getElementById(senhaid).focus();
        return false;
    }

    if (senha != confirm_senha) {
        alert("Senhas diferentes");
        document.getElementById(novaid).focus();
        return false;
    }

    return true; // Retornará true se a validação passar e o formulário será enviado
}


//Função para lidar com a resposta do servidor
function handleResponse(response) {
    if (response.status === 400) {
        // Se o status for 400 (erro), exibe um alerta com a mensagem de erro
        alert(response.statusText);
    } else {
        // Caso contrário, faça qualquer outra coisa com a resposta
        console.log(response.data);
    }
}