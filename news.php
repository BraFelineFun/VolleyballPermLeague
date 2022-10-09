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
    <link rel="stylesheet" href="Resources/styles/pages/news.css">

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

    <?php
    //Создаем запрос к бд и выполняем
    require_once 'Helpers/DB.php';
    require_once 'Helpers/str_includes.php';

    $query = "SELECT news.title, news.public_date,  news.body, news.catch_p, news.category_id, users.login
    from news join users
    on news.author_id = users.id";

    try {
        $DB_arr = executeSQL($query);
    } catch (Exception $e) {
        $DB_arr = [];
    }

    if (isset($_GET['queryFilter']) && $_GET['queryFilter'] !== ''){
        //Проверяем наличие фильтра и выкидываем элементы, которые не подходят
        $queryFilter = $_GET['queryFilter'];

        $DB_arr = array_filter($DB_arr, function($row) use ($queryFilter) {
            $lqueryFilter = mb_strtolower($queryFilter, 'UTF-8');

            return
                str_includes($row['title'], $lqueryFilter)
                || str_includes($row['login'], $lqueryFilter)
                || str_includes($row['body'], $lqueryFilter)
                || str_includes($row['catch_p'], $lqueryFilter);
        });
    }

    ?>

    <div class="section__blogContent containerNarrow">
        <div class="blog">
            <div class="blog__cards">
                <?php foreach ($DB_arr as $row): ?>
                <div class="blog__card" >
                    <div class="blog__cardImage bgIpos" style="background-image: url('/Resources/img/blog/contentImages/blog1.webp')"></div>
                    <div class="blog__cardBody">
                        <div class="blog__shortInfo">
                            <div class="blog__shortDate">
                                <?= $row['public_date'] ?>
                            </div>
                            <span class="divider"></span>
                            <div class="blog__shortCreator">
<!--                            Выводим автора    -->
                                <?= $row['login'] ?>
                            </div>
<!--                            todo: add likes -->
                        </div>

                        <div class="blog__cardContent">
                            <div class="blog__cardHeader title2">
<!--                                Заголовок-->
                                <?= $row['title'] ?>
                            </div>

                            <div class="blog__cardDescription">
<!--                                выводим первый параграф (будет виден всегда)-->
                                <p>
                                    <?= $row['catch_p'] ?>
                                </p>
                                <p>
<!--                                и остальной текст (при раскрытии карточки)-->
                                    <?= $row['body'] ?>
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
                <?php endforeach;
                if(!$DB_arr)
                    echo '
                        <div class="title2"> Ничего по запросу не найдено</div>
                    ';

                ?>

            </div>


            <div class="blog__filters">
                <form class="blog__searchBlock" action="news.php" method="get">
                    <input name="queryFilter" type="text" value="<?= $queryFilter ?>" placeholder="Искать ...">
                    <input type="submit" value="Поиск">
                </form>
                <form class="blog__searchBlock" action="news.php" method="get">
                    <input type="submit" value="✖ Очистить поиск">
                </form>
            </div>
        </div>
    </div>

</main>

<?php
require_once "./UI/footer.php";
?>

</body>
</html>
