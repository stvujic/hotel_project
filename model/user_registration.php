<?php

if(!isset($_POST['email']) || empty($_POST['email']))
{
    die("You must enter an email!");
}

if(!isset($_POST['password']) || empty($_POST['password']))
{
    die("You must enter the password");
}

require_once "database.php";

$email = $database-> real_escape_string($_POST['email']);
$password =password_hash($_POST['password'], PASSWORD_BCRYPT);

$result = $database->query("SELECT * FROM users WHERE email='$email'");

if($result->num_rows ==1)
{
    die ("User with this email already exists!");
}
else
{
    echo "You have registered successfuly!";
    $database->query("INSERT INTO users(email,password) VALUES ('$email', '$password')");
}
