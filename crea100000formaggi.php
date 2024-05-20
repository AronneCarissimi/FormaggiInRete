<?php
$conn = new mysqli("localhost", "root", "", "FORMAGGI");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

for($i=0; $i<100000; $i++){



$sensore_id = 1;
$scaffale_id = 1;
$tipo = random_int(1, 6);
$nome = "formaggio".$i;



// query di inserimento
$sql = "INSERT INTO `FORMAGGIO` (`NOME`, `SCAFFALE_ID`, `TIPO_ID`, `SENSORE_ID`) VALUES ('$nome', '$scaffale_id', '$tipo', '$sensore_id');";
$conn->query($sql);

echo "Formaggio inserito: ".$nome."<br>";
}
$conn->close();