<?php

include_once (__DIR__.'/../classes/taskmodel.php');

function getShows(){
    $items = getAllShows();
    return $items;
}


