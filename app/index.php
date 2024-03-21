<?php
// Extract the URI
$uri = $_SERVER['REQUEST_URI'];

// Split the URI into segments
$segments = explode('/', $uri);


if (false) {
    // Check if the 4th segment exists
    if (isset ($segments[4])) {
        $parameter = $segments[4];

        // Construct the database query
        $conn = new mysqli("localhost", "root", "", "formaggi");

        $query = "SELECT * FROM $parameter";

        if ($conn->connect_error) {
            die ("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($query);

        $res = $result->fetch_all();
        echo json_encode($res);

        $conn->close();
    } else {
        echo "Invalid URI.";
    }
} else {
    //redirect su profile.php
    header("Location: ./profilo/profile.php");
}
exit();

