<?php
require_once '../Helpers/DB.php';
require_once '../Helpers/isLoggedIn.php';

$table = $_GET['table'];

if (isset($_POST['newRow'])){
    //когда форма уже заполнена

    $newRow = $_POST['newRow'];
    $table = $_POST['table'];

    //Начинаем формировать строку запроса (начало)
    $query = "INSERT INTO `$table` (`id` ";


    //Начинаем формировать строку запроса (часть со значениями)
    $valuesDescript = ") VALUES ( NULL";

    foreach ($newRow as $colName => $value){

        //Если значение можно привести к числу, приводим, иначе помещаем в кавычки
        if (is_numeric($value))
            $value = (int) $value;
        else
            $value = "'$value'";

        $query .= ", `$colName`";

        $valuesDescript .= ", $value";
    }


    $query .= $valuesDescript . ")";


    try {
        $DB_res = executeSQL($query);
    } catch (Exception $e) {
        echo "$query </br>";
        echo $e;
        die();
    }

    //Если все удачно - редирект
    header("Location:/Administration/index.php?table=$table");
}



$query = "SELECT * FROM `$table` LIMIT 1";
$DB_res = [];
try {
    $DB_res = executeSQL($query)[0];
} catch (Exception $e) {
    echo $e;
    die();
}
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">


    <title> Администрирование | Interior. </title>
</head>
<body>


<main class="login containerNarrow">
    <div class="login__wrapper">
        <div class="title2">
            Создать новую запись в таблице <?= $table ?>
        </div>
        <hr>

        <form class="login__form" action="newRow.php" method="post">

            <?php
            foreach ($DB_res as $colName => $value){

            if ($colName !== 'id')
                echo "
                    <label for='$colName'>Введите $colName</label>
                    <input id=\"$colName\" name=\"newRow[$colName]\" type=\"text\">
                ";
            }

            ?>
            <input name="table" type="hidden" value="<?= $table ?>">
            <input name="submit" type="submit">
        </form>
    </div>
</main>

</body>
</html>




