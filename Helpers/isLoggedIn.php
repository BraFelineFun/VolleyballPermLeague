<?php
if(session_id() == '') {
    session_start();
}

if(!isset($_SESSION['userId']))
    header("Location:/login.php", true, 301);
