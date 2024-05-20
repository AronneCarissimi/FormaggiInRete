<?php
$conn = new mysqli("localhost", "root", "", "FORMAGGI");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*
$sql = "SELECT COUNT(NOME) FROM `FORMAGGIO` WHERE SCAFFALE_ID = 1 AND TIPO_ID = 1;";
$result = $conn->query($sql);



$res = $result->fetch_all();
echo json_encode($res);
*/
$conn->query("SET profiling = 1;");


$query="SELECT COUNT(NOME) FROM `FORMAGGIO` WHERE SCAFFALE_ID = 1 AND TIPO_ID = 1;";
$result = $conn->query($query);


$exec_time_result = $conn->query("SELECT query_id, SUM(duration) FROM information_schema.profiling GROUP BY query_id ORDER BY query_id DESC LIMIT 1;");

$exec_time_row = $exec_time_result->fetch_row();
$res = $result->fetch_all(MYSQLI_ASSOC);
echo "<p>".json_encode($res)."</p>";
echo "<p>Query executed in ".$exec_time_row[1].' seconds';

$conn->close();


//