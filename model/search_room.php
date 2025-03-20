<?php

if(!isset($_GET['room_type'])|| empty($_GET['room_type']))
{
    die("You need to enter the room type!");
}

require_once "database.php";

$room_type = mysqli_real_escape_string($database,$_GET['room_type']);

$result = $database->query("SELECT * FROM rooms WHERE room_type LIKE '%$room_type%'");

if($result->num_rows==0)
{
    die("We haven't found any rooms with that detail");
}

echo "We have found ".$result->num_rows." rooms";
