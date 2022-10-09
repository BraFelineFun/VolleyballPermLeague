<?php
require_once 'config.php';


/**
 * @throws Exception
 */
function executeSQL(string $query){
    global $hostname, $username, $password, $database; //импортируем внутрь функции из config

    $connection = mysqli_connect($hostname, $username, $password, $database);


    if ($connection === false) {
        throw new Exception("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error(), -1);
    }
    mysqli_set_charset($connection, "utf8");


    $DB_Data = mysqli_query($connection, $query);

    if (!$DB_Data) {
        throw new Exception("Произошла ошибка при выполнении запроса", -2);
    }

    $DB_arr = mysqli_fetch_all($DB_Data, MYSQLI_ASSOC);


    return $DB_arr;
}
