function openModal(modalId) {
    closeModal(); // Fecha qualquer modal aberto antes de abrir outro
    document.getElementById(modalId).style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeModal(modalId) {
    const modals = document.querySelectorAll('.modal-delete');
    modals.forEach(modal => {
        modal.style.display = 'none';
    });
    document.getElementById('overlay').style.display = 'none';
}

function confirmDelete() {
    // Adicione aqui a lógica para excluir o post
    alert('Usuário deletado com sucesso!');
    closeModal('deleteModal');
}