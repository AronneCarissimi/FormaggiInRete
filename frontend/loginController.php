<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashedPassword = md5($password);

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "formaggi");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform the login logic here
    $sql = "SELECT * FROM utente WHERE username = '$username' AND password = '$hashedPassword'";
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