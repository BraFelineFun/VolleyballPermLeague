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

    <title>Interior. Блог</title>
</head>
<body pageName ='<?= basename($_SERVER["SCRIPT_FILENAME"], ".php") ?>'>

<?php
require_once 'UI/header.php';
?>

<main class="mainBlog" >
    <div class="section__BlogTitle filterHolder bgIpos" style="background-image: url('/Resources/img/blog/BlogMain.webp')">
        <div class="titleText title-header">
            BLOG
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
                                Travis Scott
                            </div>
<!--                ADD LIKES???                -->
                        </div>

                        <div class="blog__cardContent">
                            <div class="blog__cardHeader title2">
                                Second divided from form fish beast
                            </div>

                            <div class="blog__cardDescription">
                                <p>
                                    MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower
                                </p>
                                <p>
                                    MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower
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
                                30.09.2022
                            </div>
                            <span class="divider"></span>
                            <div class="blog__shortCreator">
                                Travis Scott
                            </div>
                            <!--                ADD LIKES???                -->
                        </div>

                        <div class="blog__cardContent">
                            <div class="blog__cardHeader title2">
                                Second divided from form fish beast
                            </div>

                            <div class="blog__cardDescription">
                                <p>
                                    MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower
                                </p>
                                <p>
                                    MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower
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
                                30.09.2022
                            </div>
                            <span class="divider"></span>
                            <div class="blog__shortCreator">
                                Travis Scott
                            </div>
                            <!--                ADD LIKES???                -->
                        </div>

                        <div class="blog__cardContent">
                            <div class="blog__cardHeader title2">
                                Second divided from form fish beast
                            </div>

                            <div class="blog__cardDescription">
                                <p>
                                    MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower
                                </p>
                                <p>
                                    MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower
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
                    <input type="text" placeholder="Search for">
                    <input type="button" value="SEARCH">
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
