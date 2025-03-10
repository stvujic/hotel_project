<?php 

if(session_status()== PHP_SESSION_NONE)
{
    session_start();
}

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>

        <?php if(isset($_SESSION['email']) && isset($_SESSION['password'])): ?>
            <p>Ulogovani ste sa email adresom <?= $_SESSION['email'] ?></p>
            <a href="logout.php">Logout</a>

        <?php else: ?>
        <form action="model/user_login.php" method="POST">
            <input type="email" name="email" placeholder="Enter your email">
            <input type="password" name="password" placeholder="Enter your password">
            <button>Login</button>
        </form>

        <?php endif; ?>
    </body>
</html>