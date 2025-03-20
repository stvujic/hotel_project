<?php

require_once "functions.php";
require_once "database.php"; // Učitavamo konekciju ka bazi podataka

// Provera da li su podaci uneti u formu
if (!isset($_POST['name']) || empty($_POST['name'])) {
    die("You need to enter guest name!");
}
if (!isset($_POST['surname']) || empty($_POST['surname'])) {
    die("You need to enter guest surname!");
}
if (!isset($_POST['number']) || empty($_POST['number'])) {
    die("You need to enter room number!");
}
if (!isset($_POST['check_in']) || empty($_POST['check_in'])) {
    die("You need to enter check-in date!");
}
if (!isset($_POST['check_out']) || empty($_POST['check_out'])) {
    die("You need to enter check-out date!");
}

// Eskejpovanje podataka kako bi se sprečio SQL injection
$name = mysqli_real_escape_string($database, $_POST['name']);
$surname = mysqli_real_escape_string($database, $_POST['surname']);
$number = mysqli_real_escape_string($database, $_POST['number']); // Ostavljamo kao string
$check_in = mysqli_real_escape_string($database, $_POST['check_in']);
$check_out = mysqli_real_escape_string($database, $_POST['check_out']);

// Poziv funkcije za dodavanje gosta
echo addGuest($name, $surname, $number, $check_in, $check_out);
?>
