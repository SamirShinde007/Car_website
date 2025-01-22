<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database credentials
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'cab-hub';

    // Create connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Sanitize inputs
    $name = $conn->real_escape_string($_POST['name']);
    $mobileno = $conn->real_escape_string($_POST['mobileno']);
    $date = $conn->real_escape_string($_POST['date_time']);
    $members = (int)$_POST['family_members'];
    $vehical = $conn->real_escape_string($_POST['cab_type']);
    $location_start = $conn->real_escape_string($_POST['location_from']);
    $location_end = $conn->real_escape_string($_POST['location_to']);
    $distance = (float)$_POST['total_distance'];
    $amount = (float)$_POST['total_cost'];
    $payment = $conn->real_escape_string($_POST['payment_method']);
    $latitude = $conn->real_escape_string($_POST['latitude']);
    $longitude = $conn->real_escape_string($_POST['longitude']);

    // Insert query
    $sql = "INSERT INTO cab_bookings (name, mobileno, date_time, family_members, cab_type, location_from, location_to, total_distance, total_cost, payment_method, latitude, longitude) 
            VALUES ('$name', '$mobileno', '$date', $members, '$vehical', '$location_start', '$location_end', $distance, $amount, '$payment', '$latitude', '$longitude')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Booking successfully saved!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
