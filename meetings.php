<?php
require_once 'workFiles/config.php';
require_once 'Helpers/str_includes.php';
require_once 'Helpers/DB.php';
$currPage = "meetings.php";
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

    <title> Встречи | Volley. </title>
</head>

<?php
require_once 'UI/header.php';
?>

<body pageName ='<?= $currPage ?>'>
<main class="mainBlog" >
    <div class="section__BlogTitle filterHolder bgIpos" style="background-image: url('/Resources/img/blog/teams.jpg')">
        <div class="titleText title-header">
            ВСТРЕЧИ
        </div>

        <div class="section__filter">
        </div>
    </div>

    <?php
    //Создаем запрос к бд и выполняем
    $queryFilter = "";
    $query = "
        SELECT M.result_team1 as score1, M.result_team2 as score2, M.date as date,
        P.address as place, 
        T1.name as team1_name, T1.image as team1_image, T1.id as team1_id,
        T2.name as team2_name, T2.image as team2_image, T2.id as team2_id 
        
        FROM `MEETING` as M 
        JOIN `TEAM` as T1 
            ON M.key_team1=T1.id
        JOIN `TEAM` as T2
            ON M.key_team2=T2.id
        JOIN `PLAYGROUND` as P
            ON M.key_playground=P.id
";

    try {
        DB::getAdapter();
        $meets = DB::executeSQL($query);
    } catch (Exception $e) {
        $meets = [];
    }

    ?>

    <div class="section__blogContent containerNarrow">
        <div class="blog">
            <div class="blog__cards">
                <?php foreach ($meets as $meet): ?>
                <div class="blog__card meeting">
                    <div class="team__card title2">
                        <div class="image__section">
                            <a class="image__block" href="/team.php?id=<?= $meet["team1_id"]?>">
                                <img src="<?= $meet["team1_image"]?>" alt="team_image">
                            </a>
                        </div>
                        <div class="team__name">
                            <?= $meet["team1_name"]?>
                        </div>
                    </div>


                    <div class="score">
                        <div class="score__date title-preText">
                            <?= $meet["date"]?>
                        </div>
                        <div class="score__title">
                            <?= $meet["place"]?>
                        </div>
                        <div class="score__body">
                            <div class="score__item title-header">
                                <?= $meet["score1"]?>
                            </div>
                            <div class="score__item title-header">
                                :
                            </div>
                            <div class="score__item title-header">
                                <?= $meet["score2"]?>
                            </div>
                        </div>
                    </div>


                    <div class="team__card secondTeam">
                        <div class="image__section">
                            <a class="image__block" href="/team.php?id=<?= $meet["team2_id"]?>">
                                <img src="<?= $meet["team2_image"]?>" alt="team_image">
                            </a>
                        </div>

                        <div class="team__name title2">
                            <?= $meet["team2_name"]?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

</main>
</body>

<?php
require_once "./UI/footer.php";
?>

</html>