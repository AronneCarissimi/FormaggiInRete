<?php
// Extract the URI
$uri = $_SERVER['REQUEST_URI'];

// Split the URI into segments
$segments = explode('/', $uri);


do {
    $first = array_shift($segments);
} while ($first != 'api');

for($i = 0; $i < count($segments); $i++) {
    $segments[$i] = strtoupper($segments[$i]);
}

$tabelle = ["CASEIFICIO", "FORMAGGIO", "SCAFFALE", "SENSORE", "TEMPERATURA", "TIPO", "UMIDITA", "UTENTE",];

//print_r ($segments);



$conn = new mysqli("localhost", "root", "", "FORMAGGI");

header('Content-Type: application/json');

if (isset ($segments[0]) && ($segments[0] != "")) {
    if (!in_array($segments[0], $tabelle)) {
        echo json_encode(["error" => "invalid table: ".$segments[0]]);
        exit();
    }
    if (isset ($segments[1]) && ($segments[1] != "")) {
        if (isset ($segments[2]) && ($segments[2] != "")) {
            if (!in_array($segments[2], $tabelle)) {
                echo json_encode(["error" => "invalid table: ".$segments[2]] );
                exit();
            }
            $query = "SELECT * FROM $segments[2]  WHERE  $segments[0]_ID=$segments[1]";
        } else {
            $query = "SELECT * FROM $segments[0] WHERE  ID=$segments[1]";
        }
    } else {
        $query = "SELECT * FROM $segments[0]";
    }

    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($query);

    $res = $result->fetch_all(MYSQLI_ASSOC);



    echo json_encode($res);

    $conn->close();
} else {
    echo json_encode(["error" => "invalid request"]);
}

exit();

