<?php
// CONFIG необходим
require_once __ROOT__ . 'Helpers/DB.php';
require_once __ROOT__ . 'UI/userErrorDisplay.php';

class SighInHandler {

    static function signIn(string $login, string $password){
        $result = [
            "success" => false,
            "result" => null
        ];

        $dbConnect = DB::getAdapter();
        if (!$dbConnect['success']){
            $result["result"] = "Не удалось подключиться к Базе данных";
            return $result;
        }

        $query = "SELECT id, role, password from USER where email = ?";
        $params = [$login];
        try {
            $users = DB::executeStatement($query, $params);
        } catch (Exception $e) {
            echo userErrorDisplay('Не удалось подключиться', 'Что то пошло не так');
            $result["result"] = "Не удалось исполнить запрос к Базе данных";
            return $result;
        }

        if (!$users){
            $result["result"] = "Пользователь не найден";
            return $result;
        }

        $found = false;
        foreach ($users as $user) {
            //if (password_verify($password, $user["password"])){
            if ($password === $user["password"]){
                $found = true;
                $result["success"] = true;
                $result["result"]['id'] = $user['id'];
                $result["result"]['role'] = $user['role'];
                break;
            }
        }

        if (!$found)
            $result["result"] = "Неверный пароль"; // TODO: Изменить на НЕВЕРНЫЙ ЛОГИН ИЛИ ПАРОЛЬ
        return $result;
    }

}
