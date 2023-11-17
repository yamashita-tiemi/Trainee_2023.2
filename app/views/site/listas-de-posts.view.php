<?php 

    // require_once '../../Controllers/PostsController.php';
    use App\Controllers\PostsController;


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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



    <div class="options">
        <ul>

            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>



        </ul>
    </div>

<?php 

require 'footer.html';

?>

</body>

<script>
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
</script>

</html>

