<?php
//TODO: ПРОВЕРЯТЬ РОЛЬ и если не админ, то только по своим правам
require_once '../Helpers/DB.php';
require_once '../Helpers/isLoggedIn.php';

$table = $_GET['table'];
$id = $_GET['id'];

if (isset($_POST['newRow'])){
    //когда форма уже заполнена

    $newRow = $_POST['newRow'];
    $table = $_POST['table'];
    $id = $_POST['id'];

    // Запрос примет следующий вид:
    // UPDATE `prices` SET `id`='[value-1]',`descript`='[value-2]',`value`='[value-3]'

    //Начинаем формировать строку запроса (начало)
    $query = "UPDATE `$table` SET `id`= $id";



    foreach ($newRow as $colName => $value){

        //Если значение можно привести к числу, приводим, иначе помещаем в кавычки
        if (is_numeric($value))
            $value = (int) $value;
        else
            $value = "'$value'";

        $query .= ", `$colName`=$value";
    }

    $query .= " WHERE id = $id";

    try {
        $DB_res = executeSQL($query);
    } catch (Exception $e) {
        echo "$query </br>";
        echo $e;
        die();
    }

    //Если все удачно - редирект
    if ($_SESSION['userRole'] === 'admin')
        header("Location:/Administration/index.php?table=$table");
    else
        header("Location:/LK/");
}



$query = "SELECT * FROM `$table` WHERE id = $id";
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

        <form class="login__form" action="updateRow.php" method="post">

            <?php
            foreach ($DB_res as $colName => $value){

                if ($colName !== 'id')
                    echo "
                        <label for='$colName'>Введите $colName</label>
                        <input id=\"$colName\" name=\"newRow[$colName]\" type=\"text\" value='$value'>
                    ";
            }

            ?>
            <input name="table" type="hidden" value="<?= $table ?>">
            <input name="id" type="hidden" value="<?= $id ?>">
            <input name="submit" type="submit">
        </form>
    </div>
</main>

</body>
</html>




