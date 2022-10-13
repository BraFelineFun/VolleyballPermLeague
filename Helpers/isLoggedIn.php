<?php
session_start();
if(!$_SESSION['user'])
    header("Location:/Administration/login.php");
