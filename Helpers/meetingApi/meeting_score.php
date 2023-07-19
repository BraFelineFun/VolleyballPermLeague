<?php
require_once '../../workFiles/config.php';
require_once '../DB.php';

$user_id = $_POST['user_id'] ?? null;


$user_query = "
    SELECT role FROM PermVolleyBall.USER WHERE id=$user_id;
";

try {
    DB::getAdapter();
    $user = DB::executeSQL($user_query)[0];
    if ($user['role'] !== 'analytic') {
        http_response_code(401);
    }
}
catch (Exception $exception) {
    $response = json_encode(["message" =>["Не удалось получить права"]], JSON_UNESCAPED_UNICODE);
    echo $response;
    http_response_code(500);
    die();
}

//$response = json_encode(["message" =>[]], JSON_UNESCAPED_UNICODE);

$meeting_id = $_POST['meeting_id'] ?? null; // id встречи
$player_id = $_POST['player_id'] ?? null; // id игрока, к
$type = $_POST['type'] ?? null;
$highlight_id = $_POST['highlight_id'] ?? null; // если передается этот параметр, остальные не важны. Будет удалена запись с этим id

// Создание записи highlight
if ($meeting_id !== null && $player_id !== null && $type !== null) {
    date_default_timezone_set('Europe/Moscow');
    $time = date('Y-m-d H:i:s', time());

    $newHighlightQuery = "
        INSERT INTO `HIGHLIGHT`(`action`, `time`, `key_meeting`, `key_player`) 
        VALUES (?, ?, ?, ?);
        ";
    $newHighlightValues = [$type, $time, $meeting_id, $player_id];

    $incrementScoreQuery =
    $scoreQuery = "SELECT result_team1 as 'team1', result_team2 as 'team2' FROM `MEETING` WHERE `MEETING`.`id`=?";

    try {
        DB::executeStatement($newHighlightQuery, $newHighlightValues);
        $id = DB::getLastInsertId();

        $score = DB::executeStatement($scoreQuery, [$meeting_id])[0];
    }
    catch (Exception $exception) {
        $response = json_encode(["message" => "Не удалось создать новую запись: $exception"], JSON_UNESCAPED_UNICODE);
        echo $response;
        http_response_code(500);
        die();
    }

    $response = json_encode(["id" => $id, "score" => $score], JSON_UNESCAPED_UNICODE);
    echo $response;
    http_response_code(201);
    die();
}

// Удаление записи highlight
if ($highlight_id !== null) {
    try {
        $deleteQuery = "DELETE FROM `HIGHLIGHT` WHERE `HIGHLIGHT`.`id` = ?";
        DB::executeStatement($deleteQuery, [$highlight_id]);
    }
    catch (Exception $exception) {
        $response = json_encode(["message" => "Не удалось удалить запись: $exception"], JSON_UNESCAPED_UNICODE);
        echo $response;
        http_response_code(500);
        die();
    }

    http_response_code(201);
    die();
}

$response = json_encode(["message" => "Не хватает аргументов"], JSON_UNESCAPED_UNICODE);
echo $response;
http_response_code(403);

// TODO:: сделать проверку и если матч закончен, не принимать запросы.

