<?php

if(!isset($_POST['name'])|| empty($_POST['name']))
{
    die ("You need to enter guest name!");
}
if(!isset($_POST['surname'])|| empty($_POST['surname']))
{
    die ("You need to enter guest surname!");
}
if(!isset($_POST['number'])|| empty($_POST['number']))
{
    die ("You need to enter room number!");
}

if(!isset($_POST['check_in'])|| empty($_POST['check_in']))
{
    die ("You need to enter check in date!");
}
if(!isset($_POST['check_out'])|| empty($_POST['check_out']))
{
    die ("You need to enter check out date!");
}


require_once "database.php";

$name = $_POST['name'];
$surname = $_POST['surname'];
$number = $_POST['number'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];

$database->query("INSERT INTO guests (name, surname, number, check_in, check_out) VALUES ('$name', '$surname', $number, '$check_in', '$check_out')");

echo "You have successfully added a new guest to the list!";