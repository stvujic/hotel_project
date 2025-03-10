<?php

require_once "model/database.php";

// Uzimamo sve goste
$guests = $database->query("SELECT * FROM guests");

// Ako postoji pretraga, filtriramo
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $guests = $database->query("SELECT * FROM guests WHERE name LIKE '%$search%' OR surname LIKE '%$search%'");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest search</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="search" placeholder="Enter guest name or surname">
        <button type="submit">Search guest</button>
    </form>

    <h2>Guest List</h2>

    <ul>
        <?php foreach ($guests as $guest): ?>
            <p><?= ($guest['name']) . " " . ($guest['surname']) ?></p>
        <?php endforeach; ?>
    </ul>
</body>
</html>
