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
        btnShowPass.style.display = "flex";
        
    } else {
        btnShowPass.style.display = "none";
    }
}

function confirmarSalvarFormularioedit() {
    var mensagem = "Você tem certeza de que deseja salvar as informações do usuário?";
    if (window.confirm(mensagem)) {
        // Coletar os dados do formulário
        var username = document.getElementById("editusername").value;
        var useremail = document.getElementById("edituseremail").value;
        var userpassword = document.getElementById("edituserpassword").value;

        // Valide os dados do formulário, se necessário

        // Enviar os dados para onde você precisar (por exemplo, usando uma solicitação AJAX)
        // Aqui você pode enviar os dados para o seu servidor ou realizar ações necessárias.

        // Após a conclusão, você pode fechar o modal
        closeModal('editModal');
    }
}

function confirmDelete() {	
    // Adicione aqui a lógica para excluir o usuario    
    alert('Post deletado com sucesso!');	    
    closeModal('deleteModal');	   
}