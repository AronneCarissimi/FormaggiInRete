<?php
$conn = new mysqli("localhost", "root", "", "formaggi");
$idFormaggio = $_GET['id'];
$sql = ("DELETE FROM formaggio WHERE ID = $idFormaggio");
$conn->query($sql);
$conn->close();
echo "";