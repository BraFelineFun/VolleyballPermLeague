<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./Resources/styles/style.css">
    <link rel="stylesheet" href="./Resources/styles/normalize.css">
    <link rel="stylesheet" href="./Resources/styles/headerStyle.css">
    <link rel="stylesheet" href="./Resources/styles/footer.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="Resources/js/index.js"></script>

    <title> Блог | Interior. </title>
</head>
<body pageName ='<?= basename($_SERVER["SCRIPT_FILENAME"], ".php") ?>'>

<?php
require_once 'UI/header.php';
?>

<main class="mainBlog" >
    <div class="section__BlogTitle filterHolder bgIpos" style="background-image: url('/Resources/img/blog/BlogMain.webp')">
        <div class="titleText title-header">
            Блог
        </div>

        <div class="section__filter">
        </div>
    </div>

    <div class="section__blogContent containerNarrow">
        <div class="blog">
            <div class="blog__cards">
                <div class="blog__card" >
                    <div class="blog__cardImage bgIpos" style="background-image: url('/Resources/img/blog/contentImages/blog1.webp')"></div>
                    <div class="blog__cardBody">
                        <div class="blog__shortInfo">
                            <div class="blog__shortDate">
                                30.09.2022
                            </div>
                            <span class="divider"></span>
                            <div class="blog__shortCreator">
                                Тревис Скотт
                            </div>
<!--                ADD LIKES???                -->
                        </div>

                        <div class="blog__cardContent">
                            <div class="blog__cardHeader title2">
                                Дизайн в стиле Лофт
                            </div>

                            <div class="blog__cardDescription">
                                <p>
                                    Лофт — это стиль, который пришел к нам из индустриальных районов Америки и Европы.
                                    Он не имеет четкого направления, но объединяет в себе несколько стилей.
                                </p>
                                <p>
                                    Для него характерно использование больших пространств, большие окна, высокие потолки и свободные планировки.
                                    В нем нет места для излишеств и вычурности.
                                    Все просто, лаконично и функционально.
                                    При этом, в нем есть место для неординарных решений и смелых экспериментов.
                                </p>
                            </div>

                            <div class="cardExpand">
                                <div class="cardExpand__container">
                                    <span class="circle"></span>
                                    <span class="circle"></span>
                                    <span class="circle"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="blog__card" >
                    <div class="blog__cardImage bgIpos" style="background-image: url('/Resources/img/blog/contentImages/blog1.webp')"></div>
                    <div class="blog__cardBody">
                        <div class="blog__shortInfo">
                            <div class="blog__shortDate">
                                29.09.2022
                            </div>
                            <span class="divider"></span>
                            <div class="blog__shortCreator">
                                Дрэйк
                            </div>
                            <!--                ADD LIKES???                -->
                        </div>

                        <div class="blog__cardContent">
                            <div class="blog__cardHeader title2">
                                Интерьер ванной комнаты
                            </div>

                            <div class="blog__cardDescription">
                                <p>
                                    Интерьер ванной комнаты
                                    Ванная комната – это место, где мы можем расслабиться, отдохнуть, привести себя в порядок.
                                    В ней всегда должно быть чисто и уютно.
                                </p>
                                <p>
                                    Дизайн ванной комнаты должен быть интересным и необычным, чтобы он привлекал внимание и вдохновлял на новые идеи.
                                    Давайте рассмотрим, как можно оформить это помещение, какие стили выбрать, что необходимо сделать, чтобы ванная выглядела красиво и стильно.
                                </p>
                            </div>

                            <div class="cardExpand">
                                <div class="cardExpand__container">
                                    <span class="circle"></span>
                                    <span class="circle"></span>
                                    <span class="circle"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="blog__card" >
                    <div class="blog__cardImage bgIpos" style="background-image: url('/Resources/img/blog/contentImages/blog1.webp')"></div>
                    <div class="blog__cardBody">
                        <div class="blog__shortInfo">
                            <div class="blog__shortDate">
                                27.09.2022
                            </div>
                            <span class="divider"></span>
                            <div class="blog__shortCreator">
                                Тайлер Дерден
                            </div>
                            <!--                ADD LIKES???                -->
                        </div>

                        <div class="blog__cardContent">
                            <div class="blog__cardHeader title2">
                                Интерьеры подвальных помещений
                            </div>

                            <div class="blog__cardDescription">
                                <p>
                                    В подвале можно сделать комнату, в которой будет только диван и телевизор, или комнату с диваном и телевизором, или с диваном, телевизором и еще с кроватью, и еще со столиком, и со стулом, и с креслом. Главное, чтобы было тепло.
                                </p>
                                <p>
                                    Покрасить все в белый цвет. Подвесить повсюду люстры, поставить диваны, повесить телевизор, стол, стулья, купить шторы. Зайти в соседний магазин за продуктами и купить там все, что нужно.
                                </p>
                            </div>

                            <div class="cardExpand">
                                <div class="cardExpand__container">
                                    <span class="circle"></span>
                                    <span class="circle"></span>
                                    <span class="circle"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="blog__filters">
                <div class="blog__searchBlock">
                    <input type="text" placeholder="Искать ...">
                    <input type="button" value="Поиск">
                </div>
            </div>
        </div>
    </div>

</main>

<?php
require_once "./UI/footer.php";
?>

</body>
</html>
