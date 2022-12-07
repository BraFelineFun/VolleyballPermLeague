<?php
session_start();
if(!$_SESSION['userId'])
    header("Location:/login.php");
