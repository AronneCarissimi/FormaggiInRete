<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: ../profilo/profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form action="registerController.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <input type="submit" value="Register">
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == 1) {
            echo "<span style='color: red;'>Username already taken</span>";
        } else if ($_GET["error"] == 2) {
            echo "<span style='color: red;'>Email already taken</span>";
        }
    }
    ?>
    <br>
    <a href="login.php">Login</a>
</body>

</html>