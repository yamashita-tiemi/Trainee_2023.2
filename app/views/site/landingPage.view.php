<?php 

    use App\Controllers\PostsController;

?>


<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Salto Alto</title>
    <link rel="icon" href="../../../public/assets/2.ico" type="image/png">
    <link rel="stylesheet" href="../../../public/css/landingPagestyles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  </head>



  <body>

  <?php 

    require 'navbar.html';

  ?>

    <div class="Titulo">
      <h1 title="Titulo do blog"> Mulheres na Ciência: Histórias de Inspiração, Inovação e Empoderamento </h1>
    </div>

    <button id="scrollToTopBtn">
      <i class="fa-solid fa-angle-left fa-rotate-90" style="color: #cfb698;"></i>
    </button>
    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left" color: red></i>

      <ul class="carousel">

      <?php foreach($posts as $post) : ?>

        <li class="card">
          <div class="container">
            <div class="background">
              <div class="img"><img src="<?=$post->image?>" alt="img" draggable="false"></div>
              <h2><?=$post->content?></h2>
            </div>
            <div class="circle">
               <a href="https://www.google.com.br/?hl=pt-BR"> Ler mais</a>
              </div> 
          </div>
        </li>

        <?php endforeach; ?>

      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>



    <div class="postMeio">
      <div class="element" id="element1"></div>

      <div class="element" id="element2">
        <a href="https://www.google.com.br/?hl=pt-BR">
          <div class="img">
            <img src="../../../public/assets/gif1.gif" alt="GIF Animado">
          </div>
          <h4>Segurança online, aprenda as formas de se  manter segura na internet.</h4>
        </a>
      </div>

      <div class="element" id="element3">
        <a href="https://www.google.com.br/?hl=pt-BR">
        <div class="img">
          <img src="../../../public/assets/gif2.gif" alt="GIF Animado">
        </div>
        <h4>Oficina: “Faça seu próprio site”, CODE, UFJF.</h4>
        </a>
      </div>

    </div>  


    

    <div class="sobreNoscard">
      <div class="iconeSobreNos"><h3>Sobre nós</h3></div>
      <div class="sobreNos">

        <div class="sobreelement" id="sobreelement1">
          <div class="img">
            <img src="../../../public/assets/gif3.gif" alt="GIF Animado">
          </div>
          <h4> Salto Alto é um blog cujo objetivo é disseminar o conhecimento sobre as grandes mulheres que fizeram história e tornaram o mundo um lugar melhor. Para as mulheres que mudaram e mudam o mundo. </h4>
        </div>

        <div class="sobreelement" id="sobreelement2">
          <div class="img">
            <img src="../../../public/assets/gif4.gif" alt="GIF Animado">
          </div>
          <h4> Nossa visão é construir pontes entre as pessoas e as mulheres da ciência que fizeram história, esperamos que nossa iniciativa inspire mais mulheres a fazerem parte do mundo das pesquisas e sejam também inspiração para outras mulheres ao seu redor.</h4>
        </div>

      </div>  
    </div>

    <?php 

      require 'footer.html';
    
    ?>

  </body>
  <script src="../../../public/js/landingPage.js"></script>
</html>