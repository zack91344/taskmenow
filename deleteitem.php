<?php

include_once (__DIR__.'/classes/taskmodel.php');

$id = $_GET['id'];

deleteItem($id);

header('location:index.php');
?>