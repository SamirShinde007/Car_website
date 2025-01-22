
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabhub</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: black;
            color: rgb(255, 221, 0);;
            padding: 20px;
            box-sizing: border-box;
            position: fixed;
        }
        .sidebar a{
            text-decoration: none;
            text-transform: capitalize;
            color: rgb(255, 221, 0);
        }

        .sidebar h3{
            font-size: 22px;
            text-align: justify;
        }
        .content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
            margin-left: 250px; /* Adjust this margin to match the width of the sidebar */
        }
        h1, p {
            margin-bottom: 20px;
        }

        /* Add some styles for responsiveness */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .content {
                margin-top: -10px;
                margin-left: 0;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: static;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h3>Admin Panel</h3><hr>
            <h5><a href="index.php">Website</a></h5>
            <h5><a href="user_information.php">user information</a></h5>
            <h5><a href="add_cab.php">Add new Cab</a></h5>
           <h5><a href="cab_info.php">Cab Details</a></h5>
            <h5><a href="book_info.php">Booking Details</a></h5>
            <h5><a href="location_info.php">Add Locations details</a></h5>
            <h5><a href="feedback_info.php">feedback info</a></h5>
           <h5><a href="admin_logout.php">logout</a></h5>
        </div>
        <div class="content">
            </h3>
        </div>
    </div>
</body>
</html>
