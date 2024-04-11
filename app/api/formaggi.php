<?php

$conn = new mysqli("localhost", "root", "", "FORMAGGI");

//query
$sql = "SELECT * FROM `FORMAGGIO` ORDER BY ID";

//execute query
$result = $conn->query($sql);

$res = $result->fetch_all();
echo json_encode($res);

//close connection
$conn->close();