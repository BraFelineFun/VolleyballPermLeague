<?php
$currPage = "signUp.php";
require_once 'workFiles/config.php';
require_once 'Helpers/DB.php';
$errorMsg = "";

if (isset($_POST['userData_login']) && isset($_POST['userData_password'])){
    $errorMsg = "";

    $login = $_POST['userData_login'];
    $password = $_POST['userData_password'];
    $password2 = $_POST['userData_2password'];
    $name = $_POST['userData_name'];
    if ($password !== $password2)
        $errorMsg = "Не совпали пароли";


    unset($_POST['userData_login']);
    unset($_POST['userData_password']);
    unset($_POST['userData_2password']);
    unset($_POST['userData_name']);

    DB::getAdapter();
    $query = "INSERT INTO `USER`(`name`, `email`, `password`, `image`, `role`) VALUES (?,?,?,?,?)";
    try {
        DB::executeStatement($query, [$name, $login, $password, "", "guest"]);
        $id = DB::executeSQL("SELECT id FROM USER ORDER BY id DESC LIMIT 1; ")[0]["id"];
    }
    catch (Exception $exception) {
        $errorMsg = "Ошибка при создании, повторите попытку позднее";
    }

    if ($errorMsg === "") {
        session_start();
        $_SESSION['userId'] = $id;
        $_SESSION['userRole'] = 'guest';
        header("Location:/LK/", true, 302);
        die();
    }
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

    <title> Создание учетной записи | Volley. </title>
</head>
<body pageName ='<?= $currPage ?>'>

<?php
require_once __ROOT__ . 'UI/header.php';
?>

<main class="login containerNarrow">
    <div class="login__wrapper">
        <div class="title2">
            Создание пользователя
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
        <form class="login__form" action="signUp.php" method="post">
            <label for="login">Введите логин (email):</label>
            <input id="login" name="userData_login" type="text">
            <label for="name">Введите имя:</label>
            <input id="name" name="userData_name" type="text">
            <label for="password">Введите пароль:</label>
            <input id="password" name="userData_password" type="password">
            <label for="2password">Введите пароль повторно:</label>
            <input id="2password" name="userData_2password" type="password">

            <input name="submit" type="submit" value="Создать">
        </form>

        <hr>
        <div class="changePage">
            <p>
                Уже есть учетная запись?
            </p>
            <a href="login.php">
                Войдите в аккаунт
            </a>
        </div>
    </div>
</main>

</body>
</html>