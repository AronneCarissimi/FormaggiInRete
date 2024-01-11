<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $nome = $_POST["nome"];


    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "formaggi");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //query per prendere l'id del tipo
    $trovaTipo = "SELECT id FROM tipo WHERE nome = '$tipo'";
    $tipo_id = $conn->query($trovaTipo);
    $tipo_id = $tipo_id->fetch_assoc();
    $tipo_id = $tipo_id["id"];



    $scaffale_id = 1;

    $sensore_id = 1;

    // query di inserimento
    $sql = "INSERT INTO `FORMAGGIO` (`NOME`, `SCAFFALE_ID`, `TIPO_ID`, `SENSORE_ID`) VALUES ('$nome', '$scaffale_id', '$tipo_id', '$sensore_id');";
    $conn->query($sql);
    $conn->close();

    header("Location: profile.php");
}
?>