<?php
$currPage = "/LK";
require_once '../workFiles/config.php';
require_once '../Helpers/isLoggedIn.php';
if (isset($_GET['exit']) && $_GET['exit'] == 1) {
    unset($_SESSION['userId']);
    header("Location:/login.php", true, 302);
}
require_once '../Helpers/DB.php';
require_once '../LK/drawFieldGroup.php';
$userId = $_SESSION['userId'];
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../Resources/styles/style.css">
    <link rel="stylesheet" href="../Resources/styles/normalize.css">
    <link rel="stylesheet" href="../Resources/styles/headerStyle.css">
    <link rel="stylesheet" href="../Resources/styles/footer.css">
    <link rel="stylesheet" href="../Resources/styles/pages/user/style.css">
    <link rel="stylesheet" href="../Resources/styles/pages/teams.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="../Resources/js/index.js"></script>

    <title> Личный кабинет | Volley. </title>
</head>
<body pageName ='<?= $currPage ?>'>

<?php
DB::getAdapter();
$query = "SELECT * from `USER` where id = ?";
$userData = [];
$userData = DB::executeStatement($query, [$userId])[0];
unset($userData['id']);
unset($userData['password']);

$userImage = "";
if (isset($userData['image'])) {
    $userImage = $userData['image'];
    unset($userData['image']);
}

if ($userData['role'] === 'leader'){
    $query = "SELECT T.id as id, T.name as name, T.image as image FROM `TEAM` as T LEFT JOIN `USER` as U ON T.key_leader=U.id WHERE U.id=?";
    $teamData = DB::executeStatement($query, [$userId])[0];
}
if ($userData['role'] === 'player') {
    $query = "    SELECT T2P.key_team as team_id, P.weight as weight, P.height as height FROM `TEAM_2_PLAYER` as T2P 
                    LEFT JOIN `PLAYER` as P ON P.id=T2P.key_player 
                    WHERE T2P.`key_player` = 3 AND T2P.`status`='approved' ";
    $playerData = DB::executeStatement($query, [$userId])[0];

    if ($teamId = $playerData['team_id']) {
        unset($playerData["team_id"]);
        $query = "select TEAM.id, TEAM.name, TEAM.image from TEAM where id = $teamId";
        $teamData = DB::executeSQL($query)[0];
    }
}

require_once '../UI/header.php';
?>

<main class="mainPersonal mainBlog">
    <div class="personal__holder filterHolder bgIpos" style="background-image: url('../Resources/img/User/lk-background.jpg')">
        <div class="section__filter"></div>

        <div class="personal__infoContainer">
            <div class="personal__info">
                <div class="personal container">
                    <div class="imageItem">
                        <img
                                src='<?= $userImage !== "" ? $userImage: "/Resources/img/user_content/user_image/default.png" ?>'
                                alt="user"
                        >
                    </div>
                    <div class="titleText title-header">
                        Личный кабинет
                    </div>
                    <hr>
                    <div class="sectionDivider">
                        <div class='personal__data'>


                            <?= drawFieldGroup("Пользователь", $userData, 'USER', $userId) ?>

                            <?= isset($playerData)? drawFieldGroup("Игрок", $playerData): ""; ?>


                            <div class="personal__additional">
                                <?php
                                if (isset($teamData))
                                    require_once 'drawTeamCard.php';
                                ?>

                                <?php if ($userData['role'] === 'admin'): ?>
                                    <div class='refButton'>
                                        <a href='/Administration/'>Панель администратора</a>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>


                        <?php if ($userData['role'] === 'leader'): ?>
                            <?php require_once 'drawApplications.php' ?>
                        <?php endif; ?>
                    </div>
                    <div class="actionButton__container">
                        <div class='refButton'>
                            <a href='/LK?exit=1'>Выйти из аккаунта</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</main>
</body>
</html>