<?php
require_once 'workFiles/config.php';
require_once 'Helpers/str_includes.php';
require_once 'Helpers/DB.php';
require_once 'UI/userErrorDisplay.php';
$currPage = "meeting.php";
if(session_id() == '') {
    session_start();
}
setcookie('userId', $_SESSION['userId'], time()+60*60*2);
$meetingId = $_GET['id'];
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
    <link rel="stylesheet" href="Resources/styles/errorMessage.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script defer src="Resources/js/index.js"></script>
    <script defer src="Resources/js/meeting.js"></script>

    <title> Встреча | Volley. </title>
</head>

<?php
require_once 'UI/header.php';
?>

<body pageName ='<?= $currPage ?>'>
<main class="mainBlog" >
    <div class="section__BlogTitle filterHolder bgIpos" style="background-image: url('/Resources/img/blog/teams.jpg')">
        <div class="section__filter"></div>
        <?php
        //Создаем запрос к бд и выполняем
        $queryFilter = "";
        $query = "
        SELECT M.result_team1 as score1, M.result_team2 as score2, M.date as date, M.is_ended as is_ended,
        P.address as place, 
        T1.name as team1_name, T1.image as team1_image, T1.id as team1_id, T1.id as team1_id,
        T2.name as team2_name, T2.image as team2_image, T2.id as team2_id, T2.id as team2_id
        
        FROM `MEETING` as M 
        JOIN `TEAM` as T1 
            ON M.key_team1=T1.id
        JOIN `TEAM` as T2
            ON M.key_team2=T2.id
        JOIN `PLAYGROUND` as P
            ON M.key_playground=P.id
        WHERE M.id=?
";

        try {
            DB::getAdapter();
            $meet = DB::executeStatement($query, [$meetingId])[0];
            if ($meet === null)
                throw new Exception("");
        } catch (Exception $e) {
            echo userErrorDisplay('Не удалось получить информацию о встрече', '');
            die();
        }

        $is_analytic = isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'analytic';
        $is_meetingEnded = $meet['is_ended'];
        ?>

        <div class="section__blogContent containerNarrow absolute">
            <div class="blog">
                <div class="blog__cards">
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
                            <div class="score__title">
                                vs
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
                </div>
            </div>
        </div>
    </div>

    <div class="section__blogContent containerNarrow">
        <div class="score">
            <div class="score__body">
                <div class="score__team team1 title-header">
                    <?=$meet["score1"]?>
                </div>
                :
                <div class="score__team team2 title-header">
                    <?=$meet["score2"]?>
                </div>
            </div>
        </div>
        <?php if ($is_meetingEnded):?>
            Матч закончился!
        <?php else:?>
            <?php if ($is_analytic):?>
                <?php
                    $team1_query = "
                    SELECT 
                    u.name as 'player_name', p.id as 'player_id' 
                    
                    FROM `TEAM` as t
                    JOIN TEAM_2_PLAYER as t2p
                        ON t.id=t2p.key_team
                    JOIN PLAYER as p
                        ON t2p.key_player=p.id
                    JOIN USER as u
                        ON p.key_user=u.id
                    WHERE t.id={$meet['team1_id']} AND t2p.status='approved'
                    ";

                    $team2_query = "
                    SELECT 
                    u.name as 'player_name', p.id as 'player_id' 
                    
                    FROM `TEAM` as t
                    JOIN TEAM_2_PLAYER as t2p
                        ON t.id=t2p.key_team
                    JOIN PLAYER as p
                        ON t2p.key_player=p.id
                    JOIN USER as u
                        ON p.key_user=u.id
                    WHERE t.id={$meet['team2_id']} AND t2p.status='approved'
                    ";


                    try {
                        DB::getAdapter();
                        $players_team1 = DB::executeSQL($team1_query);
                        $players_team2 = DB::executeSQL($team2_query);

                        if ($players_team1 === null || $players_team2 === null)
                            throw new Exception("");
                    } catch (Exception $e) {
                        echo userErrorDisplay('Не удалось получить информацию о командах', '');
                        die();
                    }

                    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $encodedRef = urlencode($actual_link);
                    $pathToThisFile = explode('?', $actual_link)[0];
                    $pathToTargetFile = explode('/', $pathToThisFile);
                    unset($pathToTargetFile[count($pathToTargetFile)-1]);
                    $pathToTargetFile[] = "Helpers/meetingApi";

                    // путь к end point с завершением встречи
                    $pathToTargetFile[] = "meeting_end.php";
                    $meeting_end = implode("/", $pathToTargetFile);

                    // путь к end point изменения счета
                    unset($pathToTargetFile[count($pathToTargetFile)]);
                    $pathToTargetFile[] = "meeting_score.php";
                    $meeting_score = implode("/", $pathToTargetFile);
                ?>

            <div class="meeting_data"
                data-meeting=<?=$meetingId?>
            >
                <div class="meeting_end"
                    data-path="<?=$meeting_end?>"
                >
                    <button class="meeting_submit"> Завершить матч </button>
                </div>
                <div class="meeting_scores"
                    data-path=<?=$meeting_score?>
                >
                    <div class="meeting_score team1" data-team="<?= $meet['team1_id']?>">
                        <div class="form_container">
                            <div class="team__name title2">
                                <?= $meet['team1_name'] ?>
                            </div>
                            <label class="form_label">
                                <p>Выберете игрока:</p>
                                <select class="wideSelect" name="player">
                                    <?php foreach($players_team1 as $player): ?>
                                        <option value="<?=$player['player_id']?>">
                                            <?=$player['player_name']?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                            </label>

                            <label class="form_label">
                                <p>Выберете дейтсвие:</p>
                                <select class="wideSelect" name="type">
                                    <option value="goal">
                                        Гол
                                    </option>
                                    <option value="foul">
                                        Фол
                                    </option>
                                </select>
                            </label>

                            <button class="meeting_submit submit_team1">Готово</button>
                        </div>
                        <div class="highlights_container">

                        </div>
                    </div>

                    <div class="meeting_score team2" data-team="<?= $meet['team2_id']?>">
                        <div class="form_container">
                            <div class="team__name title2">
                                <?= $meet['team2_name'] ?>
                            </div>
                            <label class="form_label">
                                <p>Выберете игрока:</p>
                                <select class="wideSelect" name="player">
                                    <?php foreach($players_team2 as $player): ?>
                                        <option value="<?=$player['player_id']?>">
                                            <?=$player['player_name']?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                            </label>

                            <label class="form_label">
                                <p>Выберете дейтсвие:</p>
                                <select class="wideSelect" name="type">
                                    <option value="goal">
                                        Гол
                                    </option>
                                    <option value="foul">
                                        Фол
                                    </option>
                                </select>
                            </label>

                            <button class="meeting_submit submit_team2">Готово</button>
                        </div>

                        <div class="highlights_container">

                        </div>
                    </div>


                </div>
            </div>

            <?php else:?>
                Пока что не кончился)
            <?php endif; ?>
        <?php endif; ?>
    </div>

</main>
</body>

<?php
require_once "./UI/footer.php";
?>

</html>