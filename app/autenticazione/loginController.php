<?php

session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashedPassword = md5($password);

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "FORMAGGI");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform the login logic here
    $sql = "SELECT * FROM UTENTE WHERE USERNAME = '$username' AND password = '$hashedPassword'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["username"] = $row["USERNAME"];
        $_SESSION["idUtente"] = $row["ID"];

        header("Location: ../profilo/profile.php");

    } else {

        header("location: login.php?error=1");

    }
}

// Close the database connection
$conn->close();
?>