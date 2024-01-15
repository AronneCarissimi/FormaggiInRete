<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: profile.php");
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
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <input type="submit" value="Register">
    </form>

    <a href="login.php">Login</a>
</body>

</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "formaggi");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Hash the password
    $hashedPassword = md5($password);

    // Insert user data into the database
    $sql = "INSERT INTO utente (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";

    if ($conn->query($sql) === TRUE) {
        session_start();
        $sql = "SELECT * FROM utente WHERE username = '$username' AND password = '$hashedPassword'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["username"] = $row["USERNAME"];
            $_SESSION["idUtente"] = $row["ID"];

            header("Location: profile.php");
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>