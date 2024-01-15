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



    $scaffale_id = 1;

    $sensore_id = 1;

    // query di inserimento
    $sql = "INSERT INTO `FORMAGGIO` (`NOME`, `SCAFFALE_ID`, `TIPO_ID`, `SENSORE_ID`) VALUES ('$nome', '$scaffale_id', '$tipo', '$sensore_id');";
    $conn->query($sql);
    $conn->close();

    header("Location: visualizzaFormaggi.php");
}
?>