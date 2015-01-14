<?php
    //for error output
    error_reporting(E_ALL);
    ini_set('display_errors', 1); 

include_once (__DIR__.'/../classes/taskmodel.php');
$show = $_POST['show'];
addShow($show);
header('Location: /../index.php');
?>

