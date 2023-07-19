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
    http_response_code(500);
    die();
}


$_POST['is_ended']; // Когда 1, матч заканчивается
