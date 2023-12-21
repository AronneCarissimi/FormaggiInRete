<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome
        <?php echo $_SESSION["username"]; ?>!
    </h1>
    <a href="creaFormaggi.php">crea formaggi</a>
    <form method="post" action="">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>

</html>