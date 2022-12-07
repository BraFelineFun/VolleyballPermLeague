<?php
require_once '../Helpers/isLoggedIn.php';

$userId = $_SESSION['userId'];

require_once '../Helpers/DB.php';
require_once '../LK/drawFieldGroup.php';
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="../Resources/js/index.js"></script>

    <title> Личный кабинет | Interior. </title>
</head>
<body pageName ='<?= basename($_SERVER["SCRIPT_FILENAME"], ".php") ?>'>

<?php

$query = "SELECT * from `USER` where id = $userId";
$userData = [];
try {
    $userData = executeSQL($query)[0];
} catch (Exception $e) {
    echo $e;
}
unset($userData['id']);

$userImage = "";
if (isset($userData['image'])) {
    $userImage = $userData['image'];
    unset($userData['image']);
}

if ($userData['role'] === 'leader'){
    $query = "select TEAM.image, TEAM.name from TEAM JOIN PLAYER ON PLAYER.key_team = TEAM.id JOIN USER ON USER.id = PLAYER.key_user WHERE USER.id = $userId";
    $teamData = executeSQL($query)[0];
}
if ($userData['role'] === 'player') {
    $query = "select P.height, P.weight, P.key_team from USER join PLAYER P on USER.id = P.key_user where USER.id = $userId";
    $playerData = executeSQL($query)[0];
    if ($teamId = $playerData['key_team']) {
        $query = "select TEAM.name, TEAM.image from TEAM where id = $teamId";
        $teamData = executeSQL($query)[0];
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
                        <div class='personal__data field'>
                            <?= drawFieldGroup("Пользователь", $userData, 'USER', $userId) ?>

                            <?= isset($playerData)? drawFieldGroup("Игрок", $playerData): ""; ?>


                            <div class="personal__additional">
                                <?php
                                if (isset($teamData))
                                    require_once 'drawTeamCard.php';
                                ?>

                                <?php
                                if ($userData['role'] === 'admin')
                                    echo "
                                        <div class='refButton'>
                                            <a href='/Administration/'>Панель администратора</a>
                                        </div>
                                    ";
                                ?>

                            </div>
                        </div>



                        <div class="statisticItem">
                            Когда нибудь будет статистика
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</main>
</body>
</html>