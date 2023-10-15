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
    var mensagem = "Você tem certeza de que deseja salvar as informações do usuário?";
    if (window.confirm(mensagem)) {
        // Coletar os dados do formulário
        var username = document.getElementById("username").value;
        var useremail = document.getElementById("useremail").value;
        var userpassword = document.getElementById("userpassword").value;
        var passwordconfirm = document.getElementById("passwordconfirm").value;

        // Valide os dados do formulário, se necessário

        // Enviar os dados para onde você precisar (por exemplo, usando uma solicitação AJAX)
        // Aqui você pode enviar os dados para o seu servidor ou realizar ações necessárias.

        // Após a conclusão, você pode fechar o modal
        closeModal('editModal');
    }
}
