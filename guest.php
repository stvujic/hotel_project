<?php 

require_once 'model/database.php'; 

// SQL upit za dobijanje room_number i izvršavanje upita
$result = $database->query("SELECT number FROM rooms");

// Generisanje opcija za select
$options = '';
while($row = $result->fetch_assoc()) 
{
    $options .= "<option value='" . $row['number'] . "'>" . $row['number'] . "</option>"; // Dodaj novu <option> u listu, gde je value i prikazana vrednost broj sobe
}
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
