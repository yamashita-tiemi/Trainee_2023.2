

<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../public/css/sidebar.css">
        <link rel="stylesheet" href="../../../public/css/dashboard.css">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    </head>

    <body>


    <div id="overlay"></div>

    
        <div class="nav1">
            <div class="botao">
                <i class="bi bi-list" id="bb"></i>
            </div>

            <div class="navegador">
                <form id="redirect8" action="/admin">
                    <a onclick="redirect8()" href="#">
                        <span class="icone"><i class="bi bi-columns-gap"></i></span>
                        <span class="texto">Dashboard</span>
                    </a>
                </form>
                <form id="redirect7" action="/admin/users">
                    <a onclick="redirect7()" href="#">
                        <span class="icone"><i class="bi bi-people-fill"></i></span>
                        <span class="texto">Usuários</span>
                    </a>
                </form>    
                <form id="redirect3" action="/admin/posts">
                    <a onclick="redirect3()" href="#">
                        <span class="icone"><i class="bi bi-file-earmark-post"></i></span>
                        <span class="texto">Posts</span>
                    </a>
                </form>
            
            </div>

            <div class="logout">
                <a href="#">
                    <span class="icone"><i class="bi bi-box-arrow-right"></i></span>
                    <span class="texto">Log Out</span>
                </a>
            </div>
        </div>

            <div class="redimensiona">
                <div class="nav">
                    <h1>DASHBOARD</h1>
                    <div class="logoutBtn">
                        <h2>Log Out</h2>
                        <img src="../../../public/assets/dashboard/🦆 icon _log out_.svg" alt="Log Out">
                    </div>
                </div>
                <div class="cards">
                    <form id="userlist" action="/admin/users">
                        <div onclick="redirect2()">
                            <img src="../../../public/assets/dashboard/🦆 icon _people_.svg" alt="Users">
                            <h2>Gerenciar Usuários</h2>
                        </div>
                    </form>
                    <form id="postlist" action="/admin/posts">
                        <div onclick="redirect()">
                            <img src="../../../public/assets/dashboard/🦆 icon _file add_.svg" alt="Posts">
                            <h2>Gerenciar Publicações</h2>
                        </div>
                    </form>
                </div>
            </div>
    </body>

    <script>
        function redirect() {
          document.getElementById('postlist').submit();
        }
        function redirect2() {
          document.getElementById('userlist').submit();
        }
    </script>

    <script>
        function redirect8() {
            document.getElementById('redirect8').submit();
        }
        function redirect7() {
            document.getElementById('redirect7').submit();
        }
        function redirect3() {
            document.getElementById('redirect3').submit();
        }
    </script>

    <script>
        const buttonEl = document.querySelector("#bb")
        const sideEl = document.querySelector(".nav1")
        const telaEl = document.querySelector(".redimensiona")

        const opened = () => {
            

            if (sideEl.classList.contains("grande")) {
                sideEl.classList.remove("grande")
                telaEl.classList.remove("css")
                document.getElementById("overlay").style.display = "none";


            } else {
                sideEl.classList.add("grande")
                telaEl.classList.add("css")
                document.getElementById('overlay').style.display = 'block';
            }
        }

        buttonEl.addEventListener("click", opened)
     
       
    </script>

</html>
