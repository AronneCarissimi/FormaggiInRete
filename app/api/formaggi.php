<?php

$conn = new mysqli("localhost", "root", "", "formaggi");

//query
$sql = "SELECT * FROM `formaggio` ORDER BY ID";

//execute query
$result = $conn->query($sql);

$res = $result->fetch_all();
echo json_encode($res);

//close connection
$conn->close();