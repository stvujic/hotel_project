<?php

if(!isset($_GET['room_type'])|| empty($_GET['room_type']))
{
    die("You need to enter the room type!");
}

require_once "database.php";

$room_type = $_GET['room_type'];

$result = $database->query("SELECT * FROM rooms WHERE room_type LIKE '%$room_type%'");

if($result->num_rows>=1)
{
    echo "We have found ".$result->num_rows." rooms";
}
else
{
    echo "We haven't found any rooms with that detail";
}