    <head>
        <link rel="stylesheet" href="../../../public/css/navbar.css">
        <link rel="stylesheet" href="../../../public/css/global.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <div class="navbarContainer">
        <div class="logoContainer">
            <img src="../../../public/assets/navbar/saltoaltologo.png" height="110%" width="auto">
        </div>
    </div>
    <div class="bottomRownav">
        <div class="redirectsContainer">
                <a href="/"><h2 id="inicio" class="redirectsnav">INÍCIO</h2></a>
                <a href="/posts"><h2 id="blog" class="redirectsnav">BLOG</h2></a>
                <a><h2 id="contato" class="redirectsnav">CONTATO</h2></a>
        </div>
        <div class="navButtonsContainer">
            <form method="post" action="/posts/search">
                <div class="searchBar" tabindex="-1">
                    <input name="search" type="text" class="searchInput" tabindex="-1" height="auto" width="0%">
                    <img id="lupa" class="bottomRowIcons" src="../../../public/assets/navbar/lupa.png" height="60%" width="auto">
                </div>
            </form>    
            <form method="get" id="redirect4" action="/admin/login">
                <div onclick="redirect4()" class="singIn" tabindex="-1">
                    <img id="signIn" class="bottomRowIcons" src="../../../public/assets/navbar/person-fill.png" height="60%" width="auto">
                </div>
            </form>
            
        </div>
    </div>


    <script src="../../../public/js/navbar.js"></script>
    <script>
        function redirect4() {
          document.getElementById('redirect4').submit();
        }
    </script>
