<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../autenticazione/login.php");
    exit();
}

if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: ../autenticazione/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo di
        <?php echo $_SESSION["username"]; ?>
    </title>
</head>

<body>
    <h1>Welcome
        <?php echo $_SESSION["username"]; ?>!
    </h1>
    <a href="../creazione/creaCaseifici.php">crea caseifici</a> <br>
    <a href="../creazione/creaScaffali.php">crea scaffali</a> <br>
    <a href="../creazione/creaFormaggi.php">crea formaggi</a> <br>
    <a href="./visualizzaFormaggi.php">visualizza formaggi</a> <br>

    <form method="post" action="">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>

</html>