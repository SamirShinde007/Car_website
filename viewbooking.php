<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['email'])){
    header("location:login.php");
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('./images/fast.png');
            background-size: cover;
            background-position: center;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0;
        }

        .navbar {
            width: 100%;
            padding: 10px;
            margin: 10px;
            display: flex;
            height: 40px;
            background-color: rgba(65, 115, 203, 0.8);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .nav-1 {
            width: 20%;
        }

        .nav-1 a {
            color: rgb(255, 221, 0);
            margin-top: -4px;
            text-align: center;
            padding-left: 20px;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-2 {
            text-align: center;
            width: 80%;
        }

        .nav-2 a {
            margin-left: 10%;
            font-size: 18px;
            text-decoration: none;
            text-transform: capitalize;
            color: rgb(255, 221, 0);
            font-weight: 500;
        }

        .container {
            background-color:rgb(255, 255, 255);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 90%;
            max-width: 400px;
            margin-top: 60px; /* Adjust for fixed navbar */
        }

        .container h1 {
            margin-bottom: 20px;
            color: rgb(0, 0, 0);
            font-size: 24px;
        }

        .container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .container button {
            padding: 10px 20px;
            background-color: rgb(255, 221, 0);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .container button:hover {
            background-color: #005f56;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="nav-1">
            <a href="./index.php">CabHub</a>
        </div>
        <div class="nav-2">
            <a href="index.php">Home</a>
            <a href="#about">About</a>
            <a href="./book_cab.php">Booking</a>
            <a href="./viewbooking.php">View Booking Details</a>
            <a href="./feedback.php">Feedback</a>
        </div>
    </div>

    <div class="container">
        <h1>View Booking</h1>
        <form action="viewbookingdetails.php" method="get">
            <input type="tel" name="mobileno" placeholder="Enter Mobile Number" required pattern="[0-9]{10}" title="Mobile number should be 10 digits.">
            <button type="submit">View Booking</button>
        </form>
    </div>
</body>
</html>