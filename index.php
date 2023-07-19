<?php
require_once 'workFiles/config.php';
$currPage = "index.php";
?>


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
<body pageName ='<?= $currPage ?>'>

<?php
require_once 'UI/header.php';
?>

<main>

    <section class="section__1" style="background-image: url('/Resources/img/content/bgc1.jpg')">

        <div class="section__filter">
            <div class="section__absoluteTitle">
                <h2><i>ДОБРО ПОЖАЛОВАТЬ</i></h2>
                <h1>VOLLEY<span class="accent">.</span></h1>
                <h2><i>любительский волейбол</i></h2>
            </div>
        </div>

    </section>


    <section class="section__2 container" >

    </section>


    <section class="section__3">
        <div class="section__bgimage" style="background-image: url('/Resources/img/content/bgc2.webp')"></div>
        <div class="professionals__wrapper">
            <div class="professionals">
                <div class="professionals__textBox">
                    <div class="professionals__preText title-preText">
                        Пермская любительская волейбольная лига
                    </div>
                    <div class="professionals__title title-header">
                        <h2>Не только спорт, но и сообщество<span class="accent">.</span></h2>
                    </div>
                    <div class="professionals__description">
                        <p>
                            Мы, команда Пермской любительской волейбольной лиги,
                            стремимся к созданию уникальной и вдохновляющей среды
                            для всех любителей волейбола в Перми. Наша миссия заключается
                            в том, чтобы привлекать людей всех возрастов и уровней подготовки,
                            объединяя их вокруг общей страсти к этому увлекательному
                        </p>
                        <p>
                            Мы верим, что волейбол - это не просто игра, а средство
                            для создания крепких дружеских связей, развития командного духа и построения
                            здорового образа жизни.
                        </p>
                    </div>
                </div>
                <a href="/LK" class="professionals__more">
                    Присоединиться к сообществу!
                </a>
            </div>
        </div>
    </section>

    <section class="section__4">
        <div class="sectionTitle">
            <div class="title-preText">Пермская любительская волейбольная лига</div>
            <div class="sectionTitle title-header">Захватывающее приключение</div>
        </div>
        <div class="cards container">
            <div class="card" style="background-image: url('./Resources/img/content/narrowC1.jpg')">
                <div class="card__label">
                    <div class="card__title title2">Команды</div>
                    <div class="card__text">
                        <p>Вступайте в команду и станьте частью дружного сообщества. </p>
                        <p>Или напротив, создайте свое и найдите свою вторую семью.</p>
                    </div>
                </div>
            </div>
            <div class="card" style="background-image: url('./Resources/img/content/narrowC2.jpg')">
                <div class="card__label">
                    <div class="card__title title2">Игроки</div>
                    <div class="card__text">
                        <p> Наша волейбольная лига – это множество людей</p>
                        <p> Но мы всегда рады новым членам нашей дружной команды</p>
                    </div>
                </div>
            </div>
            <div class="card" style="background-image: url('./Resources/img/content/narrowC3.jpg')">
                <div class="card__label">
                    <div class="card__title title2">Статистика</div>
                    <div class="card__text">
                        <p> Соревнуйтесь с другими игроками  </p>
                        <p> Делитесь своими результатами</p>
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