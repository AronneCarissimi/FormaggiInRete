<?php
// Extract the URI
$uri = $_SERVER['REQUEST_URI'];

// Split the URI into segments
$segments = explode('/', $uri);

$conn = new mysqli("localhost", "root", "", "formaggi");

// Check if the 4th segment exists
if (isset ($segments[4]) && ($segments[4] != "")) {
    if (isset ($segments[5]) && ($segments[5] != "")) {
        if (isset ($segments[6]) && ($segments[6] != "")) {
            $query = "SELECT * FROM $segments[6]  WHERE  $segments[4]_ID=$segments[5]";
        } else {
            $query = "SELECT * FROM $segments[4] WHERE  ID=$segments[5]";
        }
    } else {
        $query = "SELECT * FROM $segments[4]";
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

