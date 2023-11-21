<?php 

    use App\Controllers\PostsController;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/listas-de-posts.css">
    <link rel="stylesheet" href="../../../public/css/global.css">
    <title>Listas De Posts</title>
</head>

<body>

    <?php 

        require 'navbar.php';

    ?>


    <main>

    <?php foreach ($posts as $post) : ?>

        <div class="cardContainer">
            <form action="/posts/pvi">
                <div class="cardHover">
                    <input name="post-id" hidden value="<?=$post->id?>">
                    <button class="cardbut" type="submit">
                        <img class="cardimg" id="lerMais" src="../../../public/assets/botao_hover.png">
                    </button>
                </div>
            </form>
            <div class="blurrableDiv">
                <div class="imgContainer">
                    <img class="backgroundImg" src="<?=$post->image?>">
                </div>
                <div class="absoluteTitleContainer">
                    <h1><?=$post->title?></h1>
                </div>
                <div class="previewContainer">
                    <h2><?=$post->content?></h2>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

       
    </main>



    <?php
        require "./app/views/Include/IncludePaginacao.php"
    ?>

    <?php 

        require 'footer.html';

    ?>

</body>

<!-- <script>
    const NumberPage = 5
    for (var page = 5; page <= NumberPage; page++) {
        const newPage = document.createElement("li")
        newPage.classList.add("page-item")

        const PageNumber = document.createElement("a")
        PageNumber.classList.add("page-link")
        PageNumber.setAttribute("href", `https://google.com/${page}`)
        PageNumber.append(page)

        newPage.append(PageNumber)

        const newList = document.querySelector("ul")
        newList.append(newPage)
    }
</script> -->

</html>

