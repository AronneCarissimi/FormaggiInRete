<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <a href="register.php">Register</a>
<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "formaggi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashedPassword = md5($password);


    // Perform the login logic here
    $sql = "SELECT * FROM utenti WHERE username = '$username' AND password = '$hashedPassword'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $_SESSION["username"] = $username;             
        header("Location: profile.php");
    } else {
        echo "Invalid username or password.";
    }
}

// Close the database connection
$conn->close();
?>
</body>
</html>

