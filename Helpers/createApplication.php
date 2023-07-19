<?php

require_once '../workFiles/config.php';
require_once 'DB.php';

$player_id = $_GET["id"];
$team_id = $_GET["team_id"];

DB::getAdapter();

$query = "UPDATE `TEAM_2_PLAYER` SET `status`='$status' WHERE key_player=$player_id";
DB::executeSQL($query);

header("Location:/LK/", true, 302);
die();