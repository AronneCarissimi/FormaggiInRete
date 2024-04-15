<?php
$conn = new mysqli("localhost", "root", "", "FORMAGGI");
$idFormaggio = $_GET['id'];
$sql = ("DELETE FROM FORMAGGIO WHERE ID = $idFormaggio");
$conn->query($sql);
$conn->close();
echo "";