<?php

require_once "model/database.php";

$result = $database->query("SELECT * FROM rooms");
$rooms = $result->fetch_all(MYSQLI_ASSOC);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All rooms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Hotel Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['ulogovan'])): ?>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                        <li class="nav-item"><a class="nav-link" href="guest.php">Add Guest/Reservation</a></li>
                        <li class="nav-item"><a class="nav-link" href="guests.php">Search Guest</a></li>
                        <li class="nav-item"><a class="nav-link" href="room.php">Add Rooms</a></li>
                        <li class="nav-item"><a class="nav-link" href="search.php">Search Room</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="registration.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php foreach ($rooms as $room): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $room['room_type'] ?></h5>
                    <p class="card-text">Room number: <?= $room['number'] ?></p>
                    <a href="single_room.php?id=<?= $room['id'] ?>" class="btn btn-primary">More information</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
