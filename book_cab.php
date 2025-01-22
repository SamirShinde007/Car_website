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
    <title>Book Cab</title>
    <style>
           body {
        font-family: Arial, sans-serif;
        background-image: url('images/back.png');
        background-size: auto;
        background-color: #f4f4f4;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 0;
    }

    .book-container {
        margin-top: 2rem;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 500px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .book-container h2 {
        width: 100%;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        display: flex;
        width: 100%;
        margin-bottom: 10px;
        align-items: center;
    }

    .form-group label {
        width: 30%;
        margin: 10px 0 5px;
        font-weight: bold;
        text-align: left;
        color: #333;
    }

    .form-group input,
    .form-group select {
        width: 70%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .book-container button {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .book-container button:hover {
        background-color: #0056b3;
    }
    </style>
</head>
<body onload="getLocation();">
    <div class="book-container">
        <h2>Book Cab</h2>
        <form method="post" class="myForm" action="store_data.php" autocomplete="off" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Full Name :</label>
                <input type="text" name="name" id="name" required pattern="[A-Za-z\s]+" title="Name should only contain letters and spaces.">
            </div>
            <div class="form-group">
                <label for="mobileno">Mobile No:</label>
                <input type="tel" name="mobileno" id="mobileno" required pattern="[0-9]{10}" title="Mobile number should be 10 digits.">
            </div>
            <div class="form-group">
                <label for="date">Choose Date and Time:</label>
                <input type="datetime-local" name="date_time" id="date" required>
            </div>
            <div class="form-group">
                <label for="members">Family Members:</label>
                <input type="number" name="family_members" id="family_members" required min="1" max="5" title="Only up to 5 family members are allowed.">
            </div>
            <div class="form-group">
                <label for="vehical">Cab Type :</label>
                <select name="cab_type" id="cab_type" required onchange="calculateCost()">
                    <option value="choose">choose</option>
                    <option value="swift">Swift</option>
                    <option value="Wegnar">Wegnar</option>
                    <option value="Ertiga">Ertiga</option>
                    <option value="Innova">Innova</option>
                    <option value="scorpio">scorpio</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location_start">Source:</label>
                <select name="location_from" id="location_from" required onchange="calculateDistance()">
                    <option value="choose">choose</option>
                    <option value="satara">Satara</option>
                    <option value="pune">Pune</option>
                    <option value="wai">wai</option>
                    <option value="kolhapur">kolhapur</option>
                    <option value="karad">karad</option>
                    <option value="sangli">sangli</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location_end">Destination:</label>
                <select name="location_to" id="location_to" required onchange="calculateDistance()">
                    <option value="choose">choose</option>
                    <option value="satara">satara</option>
                    <option value="pune">Pune</option>
                    <option value="wai">wai</option>
                    <option value="kolhapur">kolhapur</option>
                    <option value="karad">karad</option>
                    <option value="sangli">sangli</option>
                </select>
            </div>
            <div class="form-group">
                <label for="distance">Total Distance (km):</label>
                <input type="number" id="total_distance" name="total_distance" required readonly>
            </div>
            <div class="form-group">
                <label for="amount">Total Cost (₹):</label>
                <input type="text" name="total_cost" id="total_cost" value="0" readonly>
            </div>
            <div class="form-group">
                <label for="payment">Payment Method:</label>
                <select name="payment_method" id="payment_method" required onchange="togglePaymentButton()">
                    <option value="choose">choose</option>
                    <option value="cash">Cash</option>
                    <option value="online">Online Payment</option>
                </select>
            </div>
            <input type="hidden" name="latitude">
            <input type="hidden" name="longitude">
            <br><br>
            <button type="submit" name="submit" id="submitButton">Submit</button>
        </form>
    </div>
    <script>
            const distances = {
        "satara-pune": 110,
        "satara-wai": 35,
        "satara-kolhapur": 120,
        "satara-karad": 50,
        "satara-sangli": 130,
        "pune-wai": 85,
        "pune-kolhapur": 230,
        "pune-karad": 160,
        "pune-sangli": 240,
        "wai-kolhapur": 150,
        "wai-karad": 70,
        "wai-sangli": 160,
        "kolhapur-karad": 70,
        "kolhapur-sangli": 50,
        "sangli-karad": 60,
        "sangli-wai": 160,
        "sangli-kolhapur": 50,
        "sangli-pune": 240,
        "sangli-satara": 130,
         "karad-sangli": 60,
          "karad-wai": 70,
           "karad-satara": 50,
            "karad-kolhapur": 70,
             "karad-pune": 160,

    };
    const cabRates = {
        "swift": 15,
        "Wegnar": 10,
        "Ertiga": 12,
        "Innova": 20,
        "scorpio": 18
    };

    function calculateDistance() {
        const locationStart = document.getElementById("location_from").value;
        const locationEnd = document.getElementById("location_to").value;
        const key = `${locationStart}-${locationEnd}`.toLowerCase();

        if (distances[key]) {
            document.getElementById("total_distance").value = distances[key];
            calculateCost();
        } else {
            document.getElementById("total_distance").value = 0;
            document.getElementById("total").value = 0;
        }
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        }
    }

    function showPosition(position) {
        document.querySelector('.myForm input[name="latitude"]').value = position.coords.latitude;
        document.querySelector('.myForm input[name="longitude"]').value = position.coords.longitude;
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("You must allow the request for geolocation to fill out the form");
                location.reload();
                break;
        }
    }

    function calculateCost() {
        const distance = document.getElementById("total_distance").value;
        const cabType = document.getElementById("cab_type").value;

        if (distance && !isNaN(distance) && distance > 0 && cabRates[cabType]) {
            const costPerKm = cabRates[cabType];
            const totalCost = distance * costPerKm;
            document.getElementById("total_cost").value = totalCost;
        } else {
            document.getElementById("total_cost").value = "0";
        }
    }

       function togglePaymentButton() {
    const paymentMethod = document.getElementById("payment_method").value; // Fixed the ID reference
    const submitButton = document.getElementById("submitButton");
    const form = document.querySelector('.myForm');

    if (paymentMethod === "cash") {
        submitButton.textContent = "Submit";
        form.action = "store_data.php"; // Change action to store_data.php for cash
    } else if (paymentMethod === "online") {
        submitButton.textContent = "Proceed to Payment";
        form.action = "payscript.php"; // Change action to payscript.php for online payment
    }
}

    function validateForm() {
        const name = document.getElementById("name").value;
        const mobileno = document.getElementById("mobileno").value;
        const members = document.getElementById("family_members").value;

        // Regular expression for name validation
        const namePattern = /^[A-Za-z\s]+$/;
        if (!namePattern.test(name)) {
            alert("Name should only contain letters and spaces.");
            return false;
        }

        // Regular expression for mobile number validation
        const mobilePattern = /^[0-9]{10}$/;
        if (!mobilePattern.test(mobileno)) {
            alert("Mobile number should be 10 digits.");
            return false;
        }

        // Check if family members are within the allowed range
        if (members < 1 || members > 5) {
            alert("Only up to 5 family members are allowed.");
            return false;
        }

        return true;
    }
    </script>
</body>
</html>
