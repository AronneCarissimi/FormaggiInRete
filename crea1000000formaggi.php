<?php
$conn = new mysqli("localhost", "root", "", "FORMAGGI");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sensore_id = 1;
echo "Inizio inserimento";
for($i=0; $i<100000; $i++){    
$scaffale_id = random_int(1, 8);
$tipo = random_int(1, 6);
$nome = "formaggio ".$i;

// query di inserimento
$sql = "INSERT INTO `FORMAGGIO` (`NOME`, `SCAFFALE_ID`, `TIPO_ID`, `SENSORE_ID`) VALUES ('$nome', '$scaffale_id', '$tipo', '$sensore_id');";
$conn->query($sql);
}
echo "Inserimento completato";
$conn->close();