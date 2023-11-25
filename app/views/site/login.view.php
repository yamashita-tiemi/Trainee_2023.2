
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../public/css/mod_ed_posts.css">
    <link rel="stylesheet" href="../../../public/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    
 </head>

 <body>

 <div id="overlay" class="overlay" onclick="closeModal()"></div>


    <form class="formlogin" method="post" action="/admin/logar">
      <div class="separacao">
         <a href="/" >
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 26 24" fill="none" >
                  <path d="M0.939341 10.9393C0.353554 11.5251 0.353554 12.4749 0.939341 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939341 10.9393ZM26 10.5L2 10.5V13.5L26 13.5V10.5Z" fill="#B2B2B2"/>
            </svg>
         </a>
           
      </div>

      <img src="../../../public/assets/logo-saltoalto.png">

         <h3 class="cadastrar">Login</h3>
         <label>E-mail:</label>
         <br>
         <input name="email" type="text" placeholder="exemplo@email.com" >
         <br><br>
         <label>Senha:</label>
         <br>
         <input name="password" type="password" placeholder="*********" >
         <br><br>

         <?php if(isset($_SESSION['error_message'])) { ?>
               <div class="session">
                   <?= $_SESSION['error_message'] ?>
               </div>
            <?php unset($_SESSION['error_message']); 
            } ?>

      <button type="submit" class="efetuarcadastro cadastrar">
            Entrar
      </button>
      
   </form>

    <script>
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
   </script>
 </body>
 </html>