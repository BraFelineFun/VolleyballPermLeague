<?php
require_once '../Helpers/DB.php';
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
    <link rel="stylesheet" href="../Resources/styles/pages/administration/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="../Resources/js/index.js"></script>

    <title> Администрирование | Interior. </title>
</head>
<body pageName ='<?= basename($_SERVER["SCRIPT_FILENAME"], ".php") ?>'>


<main class="adminMain containerNarrow">
    <section class="section__admin1">
        <?php
        require_once '../Helpers/table_sort.php';

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
                    <?= createLink('id', 'id') ?>
                </th>
                <th class="title2">
                    <?= createLink('Описание', 'descript') ?>
                </th>
                <th class="title2">
                    <?= createLink('Цена (₽)', 'value') ?>
                </th>
            </tr>

            <?php

            $columnCount = count($DB_arr[0]) + 1; //Свое значение + ячейка действия

            foreach ($DB_arr as $row){
                $id = $row['id'];
                $descr = $row['descript'];
                $price = $row['value'];



                echo '<tr class="prices__row">';
                echo "<td>$id</td>";
                echo "<td>$descr</td>";
                echo "<td>$price</td>";
                echo "<td class='iconBlock'>
                        <a href='#'>
                            <img src='../Resources/img/admin/edit.png' alt='edit row'>
                        </a>
                        <a href='#'>
                            <img src='../Resources/img/admin/delete.png' alt='delete row'>
                        </a>
                        
                    </td>";


            }
            if (count($DB_arr) < 1){
                echo '<tr class="prices__row">';
                echo "<td> Отсутствуют данные </td>";
                echo "</tr>";
            }

            echo '<tr class="prices__row">';
            echo "<td class='addRow ' colspan=$columnCount>
                        <a href='#'>
                            <i>Добавить новую запись</i>
                            <img src='../Resources/img/admin/add.png' alt='add new row'>
                        </a>
                    </td>";
            echo "</tr>";
            ?>

        </table>


    </section>
</main>

</body>
</html>
