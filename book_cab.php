<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['email'])){
    header("location:login.php");
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
    }

    .book-container {
        margin-top: 2rem;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    .book-container h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .book-container label {
        display: block;
        margin: 10px 0;
        font-weight: bold;
        text-align: left;
    }

    .book-container input,
    select {
        width: 100%;
        padding: 6px;
        margin-bottom: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .book-container button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .book-container button:hover {
        background-color: #0056b3;
    }
</style>

<body onload="getLocation();">
    <div class="book-container">
        <h2>Book Cab</h2>
        <form method="post" class="myForm" action="payscript.php" autocomplete="off">

            <label for="">Full Name :</label>
            <input type="text" name="name" required>

            <label>Mobile No:</label>
            <input type="number" name="mobileno" required>

            <label>Age :</label>
            <input type="number" name="age" required>

            <label for="">Choose Date and Time:</label>
            <input type="datetime-local" name="date" required>

            <label for="">Family Members:</label>
            <input type="number" name="members" required>

            <label for="">Cab Type : </label>
            <select name="vehical" required>
                <option value="choose">choose</option>
                <option value="swift">Swift</option>
            </select>

            <label for="">Location From: </label>
            <select name="location_start" required>
                <option value="Sangali">Sangali</option>
                <option value="Vai">Vai</option>
            </select>

            <label for="">Location To: </label>
            <select name="location_end" required>
                <option value="Satara">Satara</option>
                <option value="Kolhapur">Kolhapur</option>
            </select>

            <input type="hidden" name="amount" value="500">
            <input type="hidden" name="latitude">
            <input type="hidden" name="longitude">

            <br><br>
            <button type="submit" name="submit">Proceed to Payment</button>
        </form>
    </div>
</body>

<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        }
    }

    function showPosition(position) {
        document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
        document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("You must allow the request for geolocation to fill out the form");
                location.reload();
                break;
        }
    }
</script>

<!-- Payscript.php for handling Razorpay Payment -->

