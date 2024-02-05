<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    session_start();
    if (isset($_SESSION["idUtente"])) {
        $id = $_SESSION["idUtente"];
    }

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "formaggi");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // query di inserimento
    $sql = "INSERT INTO `CASEIFICIO` (`NOME`, `UTENTE_ID`) VALUES ('$nome', '$id');";
    $conn->query($sql);
    $conn->close();

    header("Location: ../profilo/profile.php");
}
?>