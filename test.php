<?php

require_once 'workFiles/config.php';
require_once 'Helpers/DB.php';

DB::getAdapter();

$newHighlightQuery = "
        INSERT INTO `HIGHLIGHT` (`id`, `action`, `time`, `key_meeting`, `key_player`) 
        VALUES (NULL, ?, ?, ?, ?);
        ";
$newHighlightValues = ['goal', date('Y-m-d H:i:s', time()), 2, 5];

$res = DB::executeStatement($newHighlightQuery, $newHighlightValues);
var_dump($res);
var_dump(DB::getLastInsertId());
