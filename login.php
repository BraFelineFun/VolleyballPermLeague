<?php
$currPage = "login.php";
require_once 'workFiles/config.php';
require_once 'Helpers/SingInHandler.php';
$errorMsg = "";

if (isset($_POST['userData_login']) && isset($_POST['userData_password'])){
    $login = $_POST['userData_login'];
    $password = $_POST['userData_password'];

    unset($_POST['userData_login']);
    unset($_POST['userData_password']);

    $res = SighInHandler::signIn($login, $password);
    if ($res["success"] === true) {
        session_start();
        $_SESSION['userId'] = $res["result"]['id'];
        $_SESSION['userRole'] = $res["result"]['role'];
        header("Location:/LK/", true, 302);
        die();
    }

    $errorMsg = $res["result"];
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="Resources/styles/style.css">
    <link rel="stylesheet" href="Resources/styles/normalize.css">
    <link rel="stylesheet" href="Resources/styles/headerStyle.css">
    <link rel="stylesheet" href="Resources/styles/footer.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="Resources/js/index.js"></script>

    <title> Вход в ЛК | Volley. </title>
</head>
<body pageName ='<?= $currPage ?>'>

<?php
require_once __ROOT__ . 'UI/header.php';
?>

<main class="login containerNarrow">
    <div class="login__wrapper">
        <div class="title2">
            Войти в личный кабинет
        </div>
        <hr>

        <?php
        if ($errorMsg !== "")
            echo "
            <div class='login__error'>
                ! $errorMsg
            </div>
            ";
        ?>
        <form class="login__form" action="login.php" method="post">
            <label for="login">Введите логин (email):</label>
            <input id="login" name="userData_login" type="text">
            <label for="password">Введите пароль:</label>
            <input id="password" name="userData_password" type="password">
            <input name="submit" type="submit" value="Войти">
        </form>

        <hr>
        <div class="changePage">
            <p>
                Еще нет учетной записи?
            </p>
            <a href="signUp.php">
                Создать новую учетную запись
            </a>
        </div>
    </div>
</main>

</body>
</html>