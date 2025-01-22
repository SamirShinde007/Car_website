<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="./style/admin.css">
</head>

<body>
    <div class="signup">
        <div class="signup-container">
            <h2>Sign Up</h2>
            <form method="post" action="signup.php" onsubmit="return validateForm()">
                <label for="signupUsername">Username:</label>
                <input type="text" id="signupUsername" name="username" required>

                <label for="signupEmail">Email:</label>
                <input type="email" id="signupEmail" name="email" required>

                <label for="signupPassword">Password:</label>
                <input type="password" id="signupPassword" name="password" required>

                <button type="submit" name="submit">Sign Up</button>
            </form>

            <a href="./login.php" class="login-link">Already have an account? Login</a>
        </div>
    </div>

    <script>
        function validateForm() {
            var email = document.getElementById("signupEmail").value;
            var password = document.getElementById("signupPassword").value;

            // Regular expression for email validation
            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Regular expression for password validation (at least one letter, one number, and one special character)
            var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/;
            if (!passwordPattern.test(password)) {
                alert("Password must be at least 6 characters long and contain at least one letter, one number, and one special character.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
<?php
include('./db/connection.php');
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query1 = mysqli_query($conn, "INSERT INTO login (username, email, password) VALUES ('$username', '$email', '$password')");

    if ($query1) {
        echo "<script>alert('Sign Up Successful!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Try Again!');</script>";
    }
}
?>