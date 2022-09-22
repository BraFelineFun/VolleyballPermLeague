<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./Resources/styles/style.css">
    <link rel="stylesheet" href="./Resources/styles/normalize.css">
    <link rel="stylesheet" href="Resources/styles/headerStyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="Resources/js/index.js"></script>

    <title>Interior.</title>
</head>
<body>

<?php
require_once 'header.php';
?>

<main>

    <section class="section__1" style="background-image: url('/Resources/img/content/bgc1.webp')">

        <div class="section__filter">
            <div class="section__absoluteTitle">
                <h2><i>WELCOME TO INTERIOR</i></h2>
                <h1>Modern Interior & Design</h1>
            </div>
        </div>

    </section>


    <section class="section__2 container" >
        <div class="benefits">
            <div class="benefits__item">
                <div class="benifits__img">
                    <img src="/Resources/img/content/section2_benifits.png" alt="benefits">
                </div>
                <div class="benifits__text">
                    <div class="benifits__title"> <h3><span class="accent">C</span>reative & Modern</h3></div>
                    <div class="benifits__descr">
                        <i>
                            For each project we establish relationships with partners who we know will help us.
                            <br>
                            with partners who we know will help us.
                        </i>
                    </div>
                </div>
            </div>
            <div class="benefits__item">
                <div class="benifits__img">
                    <img src="/Resources/img/content/section2_benifits.png" alt="benefits">
                </div>
                <div class="benifits__text">
                    <div class="benifits__title"> <h3><span class="accent">C</span>reative & Modern</h3></div>
                    <div class="benifits__descr">
                        <i>
                            For each project we establish relationships with partners who we know will help us.
                        </i>
                    </div>
                </div>
            </div>
            <div class="benefits__item">
                <div class="benifits__img">
                    <img src="/Resources/img/content/section2_benifits.png" alt="benefits">
                </div>
                <div class="benifits__text">
                    <div class="benifits__title"> <h3><span class="accent">C</span>reative & Modern</h3></div>
                    <div class="benifits__descr">
                        <i>
                            For each project we establish relationships with partners who we know will help us.<br>
                            with partners who we know will help us.
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section__3">
        <div class="section__bgimage" style="background-image: url('/Resources/img/content/bgc2.webp')"></div>
        <div class="professionals__wrapper">
            <div class="professionals">
                <div class="professionals__textBox">
                    <div class="professionals__preText title-preText">
                        OUR PROFESSIONAL SERVICES
                    </div>
                    <div class="professionals__title title-header">
                        <h2>We Will Create Modern And First Class Intorior<span class="accent">.</span></h2>
                    </div>
                    <div class="professionals__description">
                        <p>
                            Aorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
                        </p>
                    </div>
                </div>
                <a href="news.php" class="professionals__more">
                    DISCOVER MORE ABOUT US
                </a>
            </div>
        </div>
    </section>

    <section class="section__4">
        <div class="sectionTitle">
            <div class="title-preText">OUR PROFESSIONAL SERVICES</div>
            <div class="sectionTitle title-header">Best Interitor Services</div>
        </div>
        <div class="cards container">
            <div class="card" style="background-image: url('./Resources/img/content/narrowC1.webp')">
                <div class="card__label">
                    <div class="card__title title2">Lightning</div>
                    <div class="card__text">
                        <p>For each project we establish</p>
                        <p>relationships with partners who we know will help us.</p>
                    </div>
                </div>
            </div>
            <div class="card" style="background-image: url('./Resources/img/content/narrowC2.webp')">
                <div class="card__label">
                    <div class="card__title title2">Interior Design</div>
                    <div class="card__text">
                        <p>For each project we establish</p>
                        <p>relationships with partners who we know will help us.</p>
                    </div>
                </div>
            </div>
            <div class="card" style="background-image: url('./Resources/img/content/narrowC3.webp')">
                <div class="card__label">
                    <div class="card__title title2">Office Decoration</div>
                    <div class="card__text">
                        <p>For each project we establish</p>
                        <p>relationships with partners who we know will help us.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<footer>

</footer>

</body>
</html>