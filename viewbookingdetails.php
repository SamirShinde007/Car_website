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

if (isset($_GET['mobileno'])) {
    $mobileno = $_GET['mobileno'];
    $sql = "SELECT * FROM cab_bookings WHERE mobileno = '$mobileno'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: auto;
            max-width: 90%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .container button {
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .container button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Details</h1>
        <?php if (isset($result) && $result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Date & Time</th>
                    <th>Family Members</th>
                    <th>Cab Type</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Distance (km)</th>
                    <th>Cost (₹)</th>
                    <th>Payment Method</th>
                    <th>Action</th>
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['mobileno']; ?></td>
                        <td><?php echo $row['date_time']; ?></td>
                        <td><?php echo $row['family_members']; ?></td>
                        <td><?php echo $row['cab_type']; ?></td>
                        <td><?php echo $row['location_from']; ?></td>
                        <td><?php echo $row['location_to']; ?></td>
                        <td><?php echo $row['total_distance']; ?></td>
                        <td><?php echo $row['total_cost']; ?></td>
                        <td><?php echo $row['payment_method']; ?></td>
                        <td>
                            <form action="deletebooking.php" method="post" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit">Cancel</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No bookings found for this mobile number.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>