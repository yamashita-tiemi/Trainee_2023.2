
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../public/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    
 </head>

 <body>


   
      <div class="separacao">
         <form id="redirect5" action="/">
            <a onclick="redirect5()" href="#" >
               <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 26 24" fill="none" >
                     <path d="M0.939341 10.9393C0.353554 11.5251 0.353554 12.4749 0.939341 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939341 10.9393ZM26 10.5L2 10.5V13.5L26 13.5V10.5Z" fill="#B2B2B2"/>
               </svg>
            </a>
         </form>
      </div>
      
   <form id="redirect6" class="formlogin" action="/login" method="post">
      <img src="../../../public/assets/logo-saltoalto.png">

         <h3 class="cadastrar">Login</h3>
         <label>E-mail:</label>
         <br>
         <input name="emaillogin" type="text" placeholder="exemplo@email.com">
         <br><br>
         <label>Senha:</label>
         <br>
         <input name="senhalogin" type="password" placeholder="*********" >
         <br><br>

      <a onclick="redirect6()" href="#">
      <div class="efetuarcadastro">
        <h3>Entrar</h3>
      </div>
      </a>
      
    </form>
 </body>

   <script>
        function redirect5() {
            document.getElementById('redirect5').submit();
        }
        function redirect6() {
            document.getElementById('redirect6').submit();
        }
   </script>

 </html>