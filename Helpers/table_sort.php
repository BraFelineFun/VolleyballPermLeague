<?php

function getSortQuery(){
    /* Все варианты сортировки */
    $sort_list = [
        'descript'   => '`descript`',
        'descript_desc'  => '`descript` DESC',
        'value'  => '`value`',
        'value_desc' => '`value` DESC'
    ];

    if (!isset($_GET['sort']))
        return '';

    $sortParams = explode('|', $_GET['sort']);
    $sortParams[] = '';


    return "ORDER BY `$sortParams[0]` $sortParams[1]";
}




/* Функция вывода ссылок */
/**
 * @param $title - text to show
 * @param $basic - name of column in table
 * @return string
 */
function createLink($title, $basic) {
    $sort = $_GET['sort'];

    if ($sort == $basic) {
        return '<a  href="?sort=' . $basic."|DESC" . '"> <span class="accent2">' . $title . '</span> <i class="sortIcon">▲</i></a>';
    } elseif ($sort == $basic."|DESC") {
        return '<a  href="?sort=' . $basic . '"> <span class="accent2">' . $title . '</span> <i class="sortIcon">▼</i></a>';
    } else {
        return '<a href="?sort=' . $basic . '">' . $title . '</a>';
    }
}