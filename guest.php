<?php 

require_once 'model/database.php'; 

// SQL upit za dobijanje room_number i izvršavanje upita
$result = $database->query("SELECT number FROM rooms");

// Generisanje opcija za select u HTML-U
$options = ''; //Inicijalizacija promenljive
while($row = $result->fetch_assoc()) //while petlja se izvršava sve dok postoji red u rezultatu SQL upita, fetch_assoc() dohvaća jedan red iz rezultata
//Svaki put kada se petlja izvrši, $row će sadržavati jedan red iz tabele rooms, konkretno, vrednost number iz tog reda
{
    $options .= "<option value='" . $row['number'] . "'>" . $row['number'] . "</option>"; // Dodaj novu <option> u listu, gde je value i prikazana vrednost broj sobe
}
//Operator .= dodaje novi <option> u $options, čuvajući prethodne vrednosti.
//value='" . $row['number'] . "'" postavlja value atribut na broj sobe (što je važno jer taj broj ide u POST zahtev kada se forma pošalje).

/*Kako izgleda generisani HTML kod :
<option value='101'>101</option>
<option value='102'>102</option>
<option value='103'>103</option> */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add guest</title>
</head>
<body>
    <form action="model/add_guest.php" method="post">
        <input type="text" name="name" placeholder="Enter guest name">
        <input type="text" name="surname" placeholder="Enter guest surname">
        
        <select name="number">
            <?= $options; ?>
        </select>

        <input type="date" name="check_in">
        <input type="date" name="check_out">
        <button>Add guest</button>
    </form>
</body>
</html>
