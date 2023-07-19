<?php
require_once 'workFiles/config.php';
require_once 'Helpers/str_includes.php';
require_once 'Helpers/DB.php';
$currPage = "players.php";
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
    <link rel="stylesheet" href="Resources/styles/pages/teams.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="Resources/js/index.js"></script>

    <title> Игроки | Volley. </title>
</head>
<body pageName ='<?= $currPage ?>'>

<?php
require_once 'UI/header.php';
?>

<main class="mainBlog" >
    <div class="section__BlogTitle filterHolder bgIpos" style="background-image: url('/Resources/img/blog/players.jpg')">
        <div class="titleText title-header">
            ИГРОКИ
        </div>

        <div class="section__filter">
        </div>
    </div>

    <?php
    //Создаем запрос к бд и выполняем
    $queryFilter = "";
    $query = "
    SELECT P.id as player_id, P.height as player_height, 
        U.name as player_name, U.image as player_image, 
        IFNULL(C.goal_count, 0) as goal_count
    FROM PLAYER AS P 
    LEFT JOIN USER AS U
        ON P.key_user=U.id
    LEFT JOIN (SELECT COUNT(key_player) as goal_count, key_player FROM HIGHLIGHT as H WHERE H.action='goal' GROUP BY key_player) as C 
        ON C.key_player=P.id
";

    try {
        DB::getAdapter();
        $players = DB::executeSQL($query);
    } catch (Exception $e) {
        $players = [];
    }

    if (isset($_GET['queryFilter']) && $_GET['queryFilter'] !== ''){
        //Проверяем наличие фильтра и выкидываем элементы, которые не подходят
        $queryFilter = $_GET['queryFilter'];

        $players = array_filter($players, function($row) use ($queryFilter) {
            $lqueryFilter = mb_strtolower($queryFilter, 'UTF-8');

            return
                str_includes($row['player_name'], $lqueryFilter)
                || str_includes($row['player_height'], $lqueryFilter)
                || str_includes($row['goal_count'], $lqueryFilter);
        });
    }

    ?>

    <div class="section__blogContent containerNarrow">
        <div class="blog">
            <div class="blog__cards">
                <?php foreach ($players as $player): ?>
                    <div class="blog__card">
                        <div class="image__section">
                            <a class="image__block" href="/player.php?id=<?= $player["player_id"]?>">
                                <img src="<?= $player["player_image"] === ""? "/Resources/img/user_content/user_image/default.png": $player["player_image"] ?>" alt="player_image">
                            </a>
                        </div>


                        <div class="info__section">
                            <div class="info__block">
                                <div class="info__title">
                                    Имя
                                </div>
                                <div class="info__data">
                                    <?= $player["player_name"] ?>
                                </div>
                            </div>

                            <div class="info__block">
                                <div class="info__title">
                                    Рост
                                </div>
                                <div class="info__data">
                                    <?= $player["player_height"] ?>см
                                </div>
                            </div>

                            <div class="info__block">
                                <div class="info__title">
                                    Забитые мячи
                                </div>
                                <div class="info__data">
                                    <?= $player["goal_count"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


                <?php
                if(!$players)
                    echo '
                        <div class="title2"> Ничего по запросу не найдено</div>
                    ';

                ?>

            </div>


            <div class="blog__filters">
                <form class="blog__searchBlock" action="players.php" method="get">
                    <input name="queryFilter" type="text" value="<?= $queryFilter ?>" placeholder="Искать ...">
                    <input type="submit" value="Поиск">
                </form>
                <form class="blog__searchBlock" action="players.php" method="get">
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
