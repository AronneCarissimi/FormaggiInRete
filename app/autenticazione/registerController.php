<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "FORMAGGI");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // put the username in lowercase
    $username = strtolower($username);
    $email = strtolower($email);

    // Check if the username is already taken
    $sql = "SELECT * FROM UTENTE WHERE USERNAME = '$username'";
    $sql = "SELECT * FROM UTENTE WHERE USERNAME = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        header("location: register.php?error=1");
        exit();
    } else {
        // Check if the email is already taken
        $sql = "SELECT * FROM UTENTE WHERE EMAIL = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            header("location: register.php?error=2");
            exit();
        }
    }


    // Hash the password
    $hashedPassword = md5($password);

    // Insert user data into the database
    $sql = "INSERT INTO UTENTE (USERNAME, PASSWORD, EMAIL) VALUES ('$username', '$hashedPassword', '$email')";

    if ($conn->query($sql) === TRUE) {
        session_start();
        $sql = "SELECT * FROM UTENTE WHERE USERNAME = '$username' AND PASSWORD = '$hashedPassword'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["username"] = $row["USERNAME"];
            $_SESSION["idUtente"] = $row["ID"];

            header("Location: ../profilo/profile.php");
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>