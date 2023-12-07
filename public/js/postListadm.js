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

function confirmDelete() {
    // Adicione aqui a lógica para excluir o post
   // alert('Post deletado com sucesso!');
    closeModal('deleteModal');
}

// function previewImage() {
//     var input = document.getElementById('imagempost');
//     var preview = document.getElementById('imagem-preview');
//     // var fundoimg = document.getElementById('fundoimgmep');
//     // fundoimg.style.display = 'block';
//     var file = input.files[0];
//     var reader = new FileReader();

//     reader.onload = function (e) {
//         preview.src = e.target.result;
//     };

//     reader.readAsDataURL(file);
// }

function previewImage() {
    var input = document.getElementById('imagempost');
    var preview = document.getElementById('imagem-preview');
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = ""; // Limpa a visualização se nenhum arquivo for selecionado
    }
}

function previewImagemep(id) {
    var input = document.getElementById('imagempostmep' + id);
    var preview = document.getElementById('imagem-previewmep' + id);
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = ""; // Limpa a visualização se nenhum arquivo for selecionado
    }
}