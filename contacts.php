<?php
require_once 'workFiles/config.php';
$currPage = "contacts.php";
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

    <link rel="stylesheet" href="./Resources/styles/pages/contacts.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="Resources/js/index.js"></script>

    <title> Контакты | Volley. </title>
</head>
<body pageName ='<?= $currPage ?>'>

<?php
require_once 'UI/header.php';
?>


<main>

    <div class="mapBox  container underHeaderPlaceholder">
        <div class="mapBox__wrapper">
            <div class="mapBox__button">
                <input type="button" value="Показать карту">
            </div>
        </div>
        <iframe
                src="https://yandex.ru/map-widget/v1/?um=constructor%3A1dad0bd80ae85236edc93cdaa3480ff6e2272691b621e97fa485b0e41afafaf9&amp;source=constructor"
                width="100%"
                height="400"
                frameborder="0">
        </iframe>
    </div>

    <div class="contact__wrapper">

        <div class="contact container">

            <div class="contact__form --contactProportion1">
                <div class="row">
                    <textarea name="Message" placeholder="Ваше сообщение" cols="30" rows="10"></textarea>
                </div>
                <div class="row">
                    <input type="text" placeholder="Ваше имя">
                    <input type="text" placeholder="Ваш email адрес">
                </div>
                <div class="row">
                    <input type="text" placeholder="Тема">
                </div>

                <div class="row__submit">
                    <input type="submit" value="Отправить">
                </div>

            </div>
            <div class="contact__data --contactProportion2">
                <div class="row">
                    <div class="contact__icon">
                        <img src="./Resources/img/Contacts/chat.png" alt="Contacts">
                    </div>
                    <div class="contact__info">
                        <div class="contacts__phone">
                            <a href="tel:+56478853222">
                                +7(800) <span class="accent">555 3 555</span>
                            </a>
                        </div>
                        <div class="contacts__email">
                            <a href="mailto:interior@design.com?subject=Interior">volley@ball.com</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="contact__icon">
                        <img src="./Resources/img/Contacts/location.png" alt="Location">
                    </div>
                    <div class="contact__info">
                        <div class="location__address">
                            <div class="location__city accent">
                                Пермь
                            </div>
                            <div class="location__fullAddress title-preText">
                                ул. Генкеля 7, Пермь, Россия
                            </div>
                        </div>
                    </div>
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
