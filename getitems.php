<?php

include_once (__DIR__.'/classes/taskmodel.php');

function getItems(){
    $items = getAllItems();
    return $items;
}
