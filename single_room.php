<?php

if(!isset($_GET['id'])|| empty($_GET['id']))
{
    die ("id of this room is not available");
}

require_once "model/database.php";

$room_id = $_GET['id'];

$result = $database->query("SELECT * FROM rooms WHERE id = $room_id");

if($result->num_rows==0)
{
    die ("Room does not exists");
}

$room = $result->fetch_assoc(); //uzima prvi rezultat koji je dobio i pretvara ga u assoc.array

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Single room description</title>
    </head>
    <body>
        <h1><?= $room['room_type'] ?></h1>
        <p>Room number:<?= $room['number'] ?></p>

        <p>Book this room:</p>
        <form action="model/add_guest.php" method="post">
        <input type="text" name="name" placeholder="Enter guest name">
        <input type="text" name="surname" placeholder="Enter guest surname">
        <input type="hidden" name="number" value="<?= $room['number'] ?>">
        <input type="date" name="check_in">
        <input type="date" name="check_out">
        <button>Add guest to this room</button>
    </form>
    </body>
</html>