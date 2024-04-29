<?php

//read post param
$param = $_GET["id"];

// Create connection
$conn = new mysqli("localhost", "root", "", "FORMAGGI");
$conn = new mysqli("localhost", "root", "", "FORMAGGI");

//query
$sql = "SELECT ID,NOME FROM `SCAFFALE` WHERE `CASEIFICIO_ID` = '$param' ORDER BY NOME";

//execute query
$result = $conn->query($sql);

$res = $result->fetch_all();
echo json_encode($res);

//close connection
$conn->close();
