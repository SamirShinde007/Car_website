<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cab-hub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM cab_bookings WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Booking cancelled successfully.";
    } else {
        echo "Error cancelling booking: " . $conn->error;
    }
}

$conn->close();
header("Location: index.php");
exit();
?>