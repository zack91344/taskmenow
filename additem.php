<?php

include_once (__DIR__.'/classes/taskmodel.php');
$item_name = $_POST['itemName'];
$item_category = $_POST['category'];
$item_date = date("y-m-d");
echo $item_date;
$is_complete = 0;
addItem($item_name, $item_category, $item_date, $is_complete);
header('Location: index.php');
?>
