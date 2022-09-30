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

    <title>Interior. Каталог</title>
</head>
<body pageName ='<?= basename($_SERVER["SCRIPT_FILENAME"], ".php") ?>'>

<?php
require_once 'UI/header.php';
?>

<main class="mainBlog" >
    <div class="section__pricesTitle filterHolder bgIpos" style="background-image: url('/Resources/img/blog/BlogMain.webp')">
        <div class="titleText title-header">
            PRICES LIST
        </div>

        <div class="section__filter"></div>
    </div>

    <div class="containerNarrow">

        <table>
            <tr>
                <td>Описание</td>
                <td>Цена</td>
            </tr>
            <tr>
                <td>услуга1</td>
                <td>1000</td>
            </tr>
            <tr>
                <td>услуга2</td>
                <td>2000</td>
            </tr>
            <tr>
                <td>услуга3</td>
                <td>3000</td>
            </tr>

        </table>

    </div>

</main>
<?php
require_once "./UI/footer.php";
?>

</body>
</html>
