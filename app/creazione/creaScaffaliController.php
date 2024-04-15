<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caseificio = $_POST["caseificio"];
    $nome = $_POST["nome"];
}

// Connect to the database
$conn = new mysqli("localhost", "root", "", "FORMAGGI");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// query di inserimento
$sql = "INSERT INTO `SCAFFALE` (`NOME`, `CASEIFICIO_ID`) VALUES ('$nome', '$caseificio');";
$conn->query($sql);
$conn->close();

header("Location: ../profilo/profile.php");

?>