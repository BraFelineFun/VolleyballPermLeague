<?php
require_once '../Helpers/DB.php';

function signIn($login, $password){

    $query = "SELECT password from users where login = '$login'";


    try {
        $data = executeSQL($query);
    } catch (Exception $e) {
        return "Не удалось подключиться к Базе данных";
    }

    if ($data){
        $found = false;
        foreach ($data as $pass){
            if ($pass['password'] === $password)
                $found = true;
        }
    }
    else return "Пользователь не найден";

    if ($found)
        return true;
    else
        return "Не верный пароль";
}


