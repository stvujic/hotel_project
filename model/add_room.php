<?php

if(!isset($_POST['room_type'])|| empty($_POST['room_type']))
{
    die ("You must enter room type!");
}

if(!isset($_POST['number'])|| empty($_POST['number']))
{
    die ("You must enter room number!");
}


require_once "database.php";

$room_type = $database-> real_escape_string($_POST['room_type']);
$number = $database-> real_escape_string($_POST['number']);

$database->query("INSERT INTO rooms (room_type, number) VALUES ('$room_type', $number)");

echo "You have succesfully added a new room to the list";