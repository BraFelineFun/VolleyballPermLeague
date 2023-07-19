<?php
require_once 'workFiles/config.php';
require_once 'Helpers/str_includes.php';
require_once 'Helpers/DB.php';
$currPage = "teams.php";
if(session_id() == '') {
    session_start();
}

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

    <title> Команды | Volley. </title>
</head>
<body pageName ='<?= $currPage ?>'>

<?php
require_once 'UI/header.php';
?>

<main class="mainBlog" >
    <div class="section__BlogTitle filterHolder bgIpos" style="background-image: url('/Resources/img/blog/teams.jpg')">
        <div class="titleText title-header">
            КОМАНДЫ
        </div>

        <div class="section__filter">
        </div>
    </div>

    <?php
    //Создаем запрос к бд и выполняем
    $queryFilter = "";
    $query = "
    SELECT T.id as team_id, T.name as team_name, T.image as team_image, 
        U.id as leader_id, U.name as leader_name,
        C.player_count
        FROM TEAM AS T 
        JOIN USER AS U 
            ON T.key_leader=U.id
        LEFT JOIN (SELECT COUNT(key_player) as player_count, key_team 
                   FROM TEAM_2_PLAYER as T2P 
                   WHERE T2P.status='approved' 
                   GROUP BY key_team) as C
            ON C.key_team=T.id
";

    try {
        DB::getAdapter();
        $teams = DB::executeSQL($query);
    } catch (Exception $e) {
        $teams = [];
    }

    if (isset($_GET['queryFilter']) && $_GET['queryFilter'] !== ''){
        //Проверяем наличие фильтра и выкидываем элементы, которые не подходят
        $queryFilter = $_GET['queryFilter'];

        $teams = array_filter($teams, function($row) use ($queryFilter) {
            $lqueryFilter = mb_strtolower($queryFilter, 'UTF-8');

            return
                str_includes($row['team_name'], $lqueryFilter)
                || str_includes($row['leader_name'], $lqueryFilter)
                || str_includes($row['player_count'], $lqueryFilter);
        });
    }

    ?>

    <div class="section__blogContent containerNarrow">
        <div class="blog">
            <div class="blog__cards">
                <?php foreach ($teams as $team): ?>
                <div class="blog__card">
                    <div class="image__section">
                        <a class="image__block" href="/team.php?id=<?= $team["team_id"]?>">
                            <img src="<?= $team["team_image"] ?>" alt="team_image">
                        </a>
                    </div>


                    <div class="info__section">
                        <div class="info__block">
                            <div class="info__title">
                                Название
                            </div>
                            <div class="info__data">
                                <?= $team["team_name"] ?>
                            </div>
                        </div>

                        <div class="info__block">
                            <div class="info__title">
                                Рукводитель
                            </div>
                            <div class="info__data">
                                <a class="link__bright" href="/user?id=<?= $team["leader_id"] ?>">
                                    <?= $team["leader_name"] ?>
                                </a>
                            </div>
                        </div>

                        <div class="info__block">
                            <div class="info__title">
                                Количество игроков
                            </div>
                            <div class="info__data">
                                <?= $team["player_count"] ?>
                            </div>
                        </div>

                        <?php if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'player'):?>
                        <div class="info__block application">
                            <div class="approve">
                                <a href="Helpers/createApplication.php?user_id=<?= $_SESSION["userId"] ?>&team_id=<?= $team["team_id"] ?>"
                                   class="approve__button big"
                                >
                                    <div>Подать заявку</div>
                                    <img src="Resources/img/LK/approve.png" alt="approve">
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>


                <?php
                if(!$teams)
                    echo '
                        <div class="title2"> Ничего по запросу не найдено</div>
                    ';

                ?>

            </div>


            <div class="blog__filters">
                <form class="blog__searchBlock" action="teams.php" method="get">
                    <input name="queryFilter" type="text" value="<?= $queryFilter ?>" placeholder="Искать ...">
                    <input type="submit" value="Поиск">
                </form>
                <form class="blog__searchBlock" action="teams.php" method="get">
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
