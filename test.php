<?php

//$ass = [
//    'a' => '123',
//    'b' => '456',
//    'c' => '789'
//];
//
//foreach ($ass as $key => $value){
//    echo "key = $key, val = $value \n";
//}

$ar = [
    'users', 'players', 'f'
];

echo in_array('plaers', $ar, true) === false;