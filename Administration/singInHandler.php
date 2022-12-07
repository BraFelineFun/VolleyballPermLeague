<?php
chdir(dirname(__FILE__));
require_once '../Helpers/DB.php';

function signIn($login, $password){

    $query = "SELECT id, role, password from `USER` where email = '$login'";
    echo $query . "                        ";

    try {
        $data = executeSQL($query);
    } catch (Exception $e) {
        echo $e;
        return "Не удалось подключиться к Базе данных";
    }

    $id = 0;
    $role = "";
    if ($data){
        $found = false;
        foreach ($data as $line){
            if ($line['password'] === $password)
            {
                $found = true;
                $id = $line['id'];
                $role = $line['role'];
            }
        }
    }
    else return "Пользователь не найден";

    if ($found)
        return ['id' => $id, 'role' => $role];
    else
        return "Не верный пароль";
}


