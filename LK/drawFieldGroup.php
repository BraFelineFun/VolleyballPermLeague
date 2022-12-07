<?php

/**
 * @param $title - Подпись для группы полей
 * @param $dataArr - ассоциативный массив - информация для вывода в виде 'название поля => значение поля'
 * @return string
 */
function drawFieldGroup ($title, $dataArr, $tableName = null, $id = null) {
    $htmlResult = "";

    $htmlResult .= "<div class='field__group'>";
    $htmlResult .= "<div class='field__groupUpdate'>";
    $htmlResult .= "<div class='field__groupTitle title2'>";
    $htmlResult .= "$title";
    $htmlResult .= "</div>";

    if (isset($tableName) && isset($id)){
        $htmlResult .= "<div class='field__updateField'>";
        $htmlResult .=  "<a href='/Administration/updateRow.php?table=$tableName&id=$id'>";
        $htmlResult .=  "<img src='../Resources/img/admin/edit.png' alt='edit row'>";
        $htmlResult .=  "</a>";
        $htmlResult .= "</div>";
    }
    $htmlResult .= "</div>";

    foreach ($dataArr as $name => $value) {
        $htmlResult .= "<div class='field__description'>";
        $htmlResult .= "<div class='field__label'>$name:</div>";
        $htmlResult .= "<div class='field__value'>$value</div>";
        $htmlResult .= "</div>";
        $htmlResult .= "</hr>";
    }

    $htmlResult .= "</div>";

    return $htmlResult;
}