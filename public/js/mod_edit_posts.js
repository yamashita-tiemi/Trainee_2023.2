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

// function confirmarSalvarFormularioposts() {
//     var mensagem = "Você tem certeza de que deseja salvar o post?";

//     if (window.confirm(mensagem)) {
//         // Coletar os dados do formulário
//         var titulopost = document.getElementById("titulopost").value;
//         var conteudopost = document.getElementById("conteudopost").value;
//         var imagempost = document.getElementById("imagempost").files[0];
//         var data_criacaopost = document.getElementById("data_criacaopost").value;
//         var autorpost = document.getElementById("autorpost").value;

//         // Validar os dados do formulário, se necessário

//         // Criar um objeto FormData para enviar os dados, incluindo a imagem
//         var formData = new FormData();
//         formData.append("titulopost", titulopost);
//         formData.append("conteudopost", conteudopost);
//         formData.append("imagempost", imagempost);
//         formData.append("data_criacaopost", data_criacaopost);
//         formData.append("autorpost", autorpost);

//         // Enviar os dados para onde você precisar (por exemplo, usando uma solicitação AJAX)
//         // Substitua "processar_post.php" pela URL ou script que processa o formulário no servidor.
//         var xhr = new XMLHttpRequest();
//         xhr.open("POST", "processar_post.php", true);
//         xhr.send(formData);

//         xhr.onreadystatechange = function () {
//             if (xhr.readyState == 4 && xhr.status == 200) {
//                 // Processo de sucesso, você pode lidar com a resposta aqui
//                 alert("Post salvo com sucesso!");
//             }
//         };

//         // Após a conclusão, você pode fechar o modal
//         closeModal('createModal');
//     }
// }

function previewImage() {
    var input = document.getElementById('imagempost');
    var preview = document.getElementById('imagem-previewmep');
    // var fundoimg = document.getElementById('fundoimgmep');
    // fundoimg.style.display = 'block';
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        preview.src = e.target.result;
    };

    reader.readAsDataURL(file);
}