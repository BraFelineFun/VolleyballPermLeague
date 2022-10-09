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
    <link rel="stylesheet" href="./Resources/styles/pages/prices.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="Resources/js/index.js"></script>

    <title>Каталог | Interior. </title>
</head>
<body pageName ='<?= basename($_SERVER["SCRIPT_FILENAME"], ".php") ?>'>

<?php
require_once 'UI/header.php';
?>

<main class="mainBlog" >
    <div class="section__pricesTitle filterHolder bgIpos" style="background-image: url('/Resources/img/blog/BlogMain.webp')">
        <div class="titleText title-header">
            Каталог услуг
        </div>

        <div class="section__filter"></div>
    </div>

    <div class="prices containerNarrow">

        <?php
            require_once 'Helpers/DB.php';
            require_once 'Helpers/table_sort.php';

            $sortQuery = getSortQuery();

            try {
                $DB_arr = executeSQL("SELECT * from prices $sortQuery");
            } catch (Exception $e) {
                $DB_arr = [];
            }
        ?>


        <table class="prices__table">
            <tr>
                <th class="title2">
                    <?= createLink('Описание', 'descript') ?>
                </th>
                <th class="title2">
                    <?= createLink('Цена (₽)', 'value') ?>
                </th>
            </tr>

            <?php
                foreach ($DB_arr as $row){

                    $descr = $row['descript'];
                    $price = $row['value'];


                    echo '<tr class="prices__row">';
                    echo "<td>$descr</td>";
                    echo "<td>$price</td>";
                    echo "</tr>";

                }
                if (count($DB_arr) < 1){
                    echo '<tr class="prices__row">';
                    echo "<td> Отсутствуют данные </td>";
                    echo "</tr>";
                }
            ?>

        </table>

        <div class="prices__hint">
            <i>Нажмите на интересующее поле в заголовке таблицы для сортировки</i>
        </div>

    </div>

</main>
<?php
require_once "./UI/footer.php";
?>

</body>
</html>
