<?php

require_once __ROOT__ . 'Helpers/str_includes.php';

class DB
{
    private static $adapter;

    public static function getAdapter()
    {
        if (is_null(self::$adapter)) {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $db_config = include(__ROOT__ . 'workFiles/config.php');
            $db_config = $db_config["database"];

            try {
                self::$adapter = new mysqli($db_config["hostname"], $db_config["username"], $db_config["pass"], $db_config["database"], $db_config["port"]);
            }
            catch (Exception $exception) {
                return ["success" => false, "result" => $exception->getMessage()];
            }

            self::$adapter->set_charset($db_config["charset"]);
            self::$adapter->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
        }
        return ["success" => true, "result" => self::$adapter];
    }

    /**
     * @param string $sql - строка запроса, обязательно содержащая знаки вопроса
     * @param array $params - массив вставляемых параметров, длины равной количеству знаков вопроса
     * @param string $types
     * @return bool | array
     * @throws Exception
     */
    public static function executeStatement(string $sql, array $params, string $types = ""){
        if (is_null(self::$adapter)){
            throw new Exception("Не найдено подключение");
        }
        $types = $types ?: str_repeat("s", count($params));

        $stmt= self::$adapter->prepare($sql);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        if (!str_includes($sql, "SELECT")) return true;
        try {
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
        catch (Exception $exception){
            echo $exception->getMessage();
        }

        return $result;
    }

    public static function executeSQL(string $sql) {
        if (!is_string($sql) || $sql === ""){
            throw new Exception("Ожидалась строка. Получен другой тип или пустая строка");
        }
        if (is_null(self::$adapter)){
            throw new Exception("Не найдено подключение");
        }

        $queryResult = self::$adapter->query($sql);

        if (!str_includes($sql, "SELECT")) return $queryResult;

        $result = $queryResult->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public static function executeMultipleSql(string $sql) {
        if (!is_string($sql) || $sql === ""){
            throw new Exception("Ожидалась строка. Получен другой тип или пустая строка");
        }
        if (is_null(self::$adapter)){
            throw new Exception("Не найдено подключение");
        }

        $result = [];
        self::$adapter->multi_query($sql);

        do {
            /* сохранить набор результатов в PHP */
            if ($rawResult = self::$adapter->store_result()) {
                while ($row = $rawResult->fetch_row()) {
                    $result[] = $row;
                }
            }
        } while (self::$adapter->next_result());

        return $result;
    }

    public static function getLastInsertId() {
        return self::$adapter->insert_id;
    }
}