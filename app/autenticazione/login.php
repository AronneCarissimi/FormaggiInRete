<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: ../profilo/profile.php");
    exit();
}

$error = isset($_GET["error"]) ? $_GET["error"] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form method="POST" action="loginController.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <?php
    if ($error === "1") {
        echo "<span style='color: red;'>Invalid username or password</span>";
    }
    ?>
    <br>
    <a href="register.php">Register</a>

</body>

</html>

</html>