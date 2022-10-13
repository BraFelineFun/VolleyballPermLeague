<?php
require_once '../Helpers/isLoggedIn.php';

/** Функция генерирует HTML код. Возвращает в виде строки
 * @param string $tableName
 * @return string
 */
function drawTable(string $tableName){

        $htmlString = "";

        try {
            $DB_arr = executeSQL("SELECT * from $tableName");
        } catch (Exception $e) {
            return (string)$e;
        }

        $htmlString .= "<table class='prices__table'>";
        $htmlString .= "<tr>";

        //ШАПКА ТАБЛИЦЫ
        $header = $DB_arr[0];
        foreach ($header as $key => $value) {
            $htmlString .=  "<th class='title2'>";

            $htmlString .=  $key;

            $htmlString .=  "</th>";
        }


        $htmlString .= "</tr>";

        $columnCount = count($DB_arr[0]) + 1; //Свое значение + ячейка действия

        //ТЕЛО ТАБЛИЦЫ
        foreach ($DB_arr as $row){
            $id = $row['id'];

            $htmlString .=  '<tr class="prices__row">';

            foreach ($row as  $td)
                $htmlString .=  "<td>$td</td>";

            $htmlString .=  "<td class='iconBlock'>";
            $htmlString .=  "    <a href='updateRow.php?table=$tableName&id=$id'>";
            $htmlString .=  "        <img src='../Resources/img/admin/edit.png' alt='edit row'>";
            $htmlString .=  "    </a>";
            $htmlString .=  "    <a href='deleteRow.php?table=$tableName&id=$id'>";
            $htmlString .=  "        <img src='../Resources/img/admin/delete.png' alt='delete row'>";
            $htmlString .=  "    </a>";
            $htmlString .=  "</td>";


        }
        if (count($DB_arr) < 1){
            $htmlString .=  '<tr class="prices__row">';
            $htmlString .=  "<td> Отсутствуют данные </td>";
            $htmlString .=  "</tr>";
        }

        //ЯЧЕЙКА ДОБАВИТЬ СТРОКУ
        $htmlString .=  '<tr class="prices__row">';
        $htmlString .=  "
                <td class='addRow ' colspan=$columnCount>
                    <a href='newRow.php?table=$tableName'>
                        <i>Добавить новую запись</i>
                        <img src='../Resources/img/admin/add.png' alt='add new row'>
                    </a>
                </td>";
        $htmlString .=  "</tr>";
        $htmlString .= "</table>";


        return $htmlString;

}