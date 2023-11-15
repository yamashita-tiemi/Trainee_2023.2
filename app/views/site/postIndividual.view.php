<?php 

    require 'navbar.html';
    // require_once '../../Controllers/PostsController.php';
    use App\Controllers\PostsController;


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salto Alto</title>
    <link rel="stylesheet" href="../../../public/css/pvi-styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php foreach ($posts as $post) : ?>
        <div class="navpvi"></div>
            <div class="ondastitulo">
                <svg width="100%" viewBox="0 0 1440 196" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_d_0_1)">
                    <path d="M1 5H1441V92.8527C1441 92.8527 1272.81 158.541 1152 169.078C990.858 183.132 907.082 115.566 744.5 113.847C568.137 111.982 400.583 175.765 224.5 169.078C104.447 164.519 1 113.847 1 113.847V5Z" fill="url(#paint0_linear_0_1)" fill-opacity="0.45" shape-rendering="crispEdges"/>
                    </g>
                    <g filter="url(#filter1_d_0_1)">
                    <path d="M0 4H1440V102.133C1440 102.133 1343.47 82.9758 1229 102.133C1076.23 127.7 878.986 192.564 716 183.056C502.14 170.58 395.434 56.0985 184 82.7262C109.513 92.1069 0 126.666 0 126.666V4Z" fill="url(#paint1_linear_0_1)" fill-opacity="0.45" shape-rendering="crispEdges"/>
                    </g>
                    <text class="titulopvi" x="50%" y="35%" alignment-baseline="middle" text-anchor="middle" fill="#401C2A" font-size="48">
                        <?=$post->title ?>
                    </text>
                    <defs>
                    <filter id="filter0_d_0_1" x="-7" y="1" width="1456" height="182" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="4"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                    </filter>
                    <filter id="filter1_d_0_1" x="-8" y="0" width="1456" height="196" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="4"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                    </filter>
                    <linearGradient id="paint0_linear_0_1" x1="1.00001" y1="171.016" x2="1381.49" y2="-210.391" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FF5D57"/>
                    <stop offset="0.359375" stop-color="#DD0B64"/>
                    <stop offset="0.729167" stop-color="#6F0550"/>
                    <stop offset="1" stop-color="#401C2A"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_0_1" x1="1440" y1="3.99993" x2="34.4585" y2="331.873" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FF5D57"/>
                    <stop offset="0.375" stop-color="#DD0B64"/>
                    <stop offset="0.734375" stop-color="#6F0550"/>
                    <stop offset="1" stop-color="#401C2A"/>
                    </linearGradient>
                    </defs>
                    </svg>
            </div>
        <div class="corpopvi">
            <div class="imagedivpvi">
                <img class="opacityimgpvi" alt="Imagem do post" src="../../../public/imagens/Ada_lovelace 1.png">
                <figcaption>Criadora do primeiro programa de computadores da história.</figcaption>
            </div>
            <p>
            <?=$post->content ?>
            </p>
            <?php foreach ($users as $user) : ?>
                <?php if ($user->id === $post->author) : ?>
                    <h2>Autor(a): <?=$user->name ?></h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <h2>Data: <?=$post->created_at ?> </h2>
        </div>
    <?php endforeach; ?>
</body>

<?php 

require 'footer.html';

?>

</html>