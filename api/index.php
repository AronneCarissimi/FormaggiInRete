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


//print_r ($segments);

$conn = new mysqli("localhost", "root", "", "FORMAGGI");


if (isset ($segments[0]) && ($segments[0] != "")) {
    if (isset ($segments[1]) && ($segments[1] != "")) {
        if (isset ($segments[2]) && ($segments[2] != "")) {
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
    echo "Invalid request";
}

exit();

