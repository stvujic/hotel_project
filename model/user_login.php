<?php

if(!isset($_POST['email']) || empty($_POST['email']))
{
    die("You must enter an email for login");
}

if(!isset($_POST['password']) || empty($_POST['password']))
{
    die("You must enter password for login");
}

require_once "database.php";

$email = $database-> real_escape_string($_POST['email']);
$password = $database->real_escape_string($_POST['password']);

$result = $database -> query("SELECT * FROM users WHERE email = '$email'");

if($result->num_rows ==1)
{
    $user = $result->fetch_assoc(); //uzimamo podatke od korisnika sve sa ovim fetch assoc, znaci email i sifru imamo u varijabli $user
    $passwordVerified = password_verify($password, $user['password']); //poredimo podatak iz polja u formi sa sifrom koja se nalazi u bazi 

    if($passwordVerified) // ako je password dobar, pokrecemo sesiju, postavljamo session['ulogovan'] na true i uzimamo id iz sesije za tog user
    {
        if(session_status()== PHP_SESSION_NONE)
        {
            session_start();
        }
        $_SESSION['ulogovan'] = true;
        $_SESSION['user_id'] = $user['id'];

        header("Location: ../rooms.php");
    }
    else
    {
        echo "Your password is not correct!";
    }
}
else
{
    echo "This user does not exist!";
}
