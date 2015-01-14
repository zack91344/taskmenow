<?php
include_once (__DIR__.'/../classes/taskmodel.php');

function getEpisodes(){
    $items = getAllEpisodes();
    return $items;
}