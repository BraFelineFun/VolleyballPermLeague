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

    <title> Главная | Interior. </title>
</head>
<body pageName ='<?= basename($_SERVER["SCRIPT_FILENAME"], ".php") ?>'>

<?php
require_once 'UI/header.php';
?>

<main>

    <section class="section__1" style="background-image: url('/Resources/img/content/bgc1.webp')">

        <div class="section__filter">
            <div class="section__absoluteTitle">
                <h2><i>ДОБРО ПОЖАЛОВАТЬ</i></h2>
                <h1>СОВРЕМЕННЫЙ ДИЗАЙН - INTERIOR<span class="accent">.</span></h1>
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
                    <div class="benifits__title"> <h3><span class="accent">О</span>пыт</h3></div>
                    <div class="benifits__descr">
                        <i>
                            В создании интерьеров для наших клиентов
                            <br>
                            составляет более 5 лет.
                        </i>
                    </div>
                </div>
            </div>
            <div class="benefits__item">
                <div class="benifits__img">
                    <img src="/Resources/img/content/section2_benifits.png" alt="benefits">
                </div>
                <div class="benifits__text">
                    <div class="benifits__title"> <h3><span class="accent">Р</span>еализовано</h3></div>
                    <div class="benifits__descr">
                        <i>
                            более 100 проектов по всей России
                        </i>
                    </div>
                </div>
            </div>
            <div class="benefits__item">
                <div class="benifits__img">
                    <img src="/Resources/img/content/section2_benifits.png" alt="benefits">
                </div>
                <div class="benifits__text">
                    <div class="benifits__title"> <h3><span class="accent">Н</span>алажены</h3></div>
                    <div class="benifits__descr">
                        <i>
                            контакты с поставщиками внутри России и за рубежом
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
                        Наши профессиональные услуги
                    </div>
                    <div class="professionals__title title-header">
                        <h2>Мы создаем современные интерьеры первого класса<span class="accent">.</span></h2>
                    </div>
                    <div class="professionals__description">
                        <p>
                            Чтобы начать работу с нами, вам не нужны специальные знания о стилях, правилах эргономики, материалах. Мы учтем ваши пожелания,
                            и все наши знания будут применены для создания идеального пространства для вас. А в плоскости чертежа мы четко отразим все наши идеи для более точной реализации нашего совместного проекта.
                        </p>
                        <p>
                            Мы работаем, чтобы вам хотелось возвращаться домой, ведь каждая деталь в нем будет о Вас и для Вас.
                        </p>
                    </div>
                </div>
                <a href="news.php" class="professionals__more">
                    Узнать о нас больше
                </a>
            </div>
        </div>
    </section>

    <section class="section__4">
        <div class="sectionTitle">
            <div class="title-preText">Наши профессиональные услуги</div>
            <div class="sectionTitle title-header">Захватывающие интерьеры</div>
        </div>
        <div class="cards container">
            <div class="card" style="background-image: url('./Resources/img/content/narrowC1.webp')">
                <div class="card__label">
                    <div class="card__title title2">Актуальность</div>
                    <div class="card__text">
                        <p>Актуальные дизайнерские приемы для зонирования помещений помогают </p>
                        <p>не только решить проблему недостатка площади, но и создать эргономичный, функциональный интерьер в любой квартире.</p>
                    </div>
                </div>
            </div>
            <div class="card" style="background-image: url('./Resources/img/content/narrowC2.webp')">
                <div class="card__label">
                    <div class="card__title title2">Современные подходы</div>
                    <div class="card__text">
                        <p>Зонирование пространства современной квартиры –</p>
                        <p> один из ключевых моментов в разработке дизайн-проекта</p>
                    </div>
                </div>
            </div>
            <div class="card" style="background-image: url('./Resources/img/content/narrowC3.webp')">
                <div class="card__label">
                    <div class="card__title title2">Уникальность</div>
                    <div class="card__text">
                        <p>В дизайн-проектах мы отражаем уникальность каждого человека, </p>
                        <p>как личности, для которого проектируем будущее пространство.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php
require_once "./UI/footer.php";
?>

</body>
</html>