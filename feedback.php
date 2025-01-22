<?php
session_start();
include('db/connection.php');

if(!isset($_SESSION['email'])){
    header("location:login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Collect data from the form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    // Insert data into the database
    $sql = "INSERT INTO feedback (email, subject, feedback) VALUES ('$email', '$subject', '$feedback')";
    
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('./images/taxi2.png');
            background-size: auto;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .navbar {
            width: 100%;
            padding: 10px;
            margin: 10px;
            display: flex;
            height: 40px;
            background-color:rgb(106, 106, 106);
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

        .feedback {
            background-color: #ffffff;
            padding: 46px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            margin-top: 60px; /* Adjust for fixed navbar */
        }

        .feedback h2 {
            margin-bottom: 20px;
            color: rgb(0, 0, 0);
            font-size: 24px;
        }

        .feedback form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .feedback label {
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
            text-align: left;
            width: 100%;
        }

        .feedback input[type="email"],
        .feedback input[type="text"],
        .feedback textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .feedback button {
            padding: 10px 20px;
            background-color: rgb(255, 221, 0);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            align-self: center;
        }

        .feedback button:hover {
            background-color: rgb(0, 0, 0);
        }

        .form-group {
            display: flex;
            width: 100%;
            margin-bottom: 20px;
            align-items: center;
        }

        .form-group label {
            width: 30%;
            margin: 0;
        }

        .form-group input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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

    <div class="feedback">
        <h2>Feedback</h2>
        <form action="feedback.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
            </div>

            <label for="feedback">Feedback:</label>
            <textarea name="feedback" id="feedback" cols="40" rows="6"></textarea>
            <br><br>
            <button type="submit" name="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>