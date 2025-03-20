<?php 

require_once "database.php";

function addGuest($name, $surname, $number, $check_in, $check_out)
{
    global $database;

    $query = "INSERT INTO guests (name, surname, number, check_in, check_out) VALUES ('$name', '$surname', $number, '$check_in', '$check_out')";

    $database->query($query);

    return "You have successfully added a new guest to the list!";

}