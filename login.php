<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/new.css">
</head>

<body>
    <div class="login">
        <div class="login-container">
            <h2> Login</h2>
            <form id="loginForm" action="login.php" method="post" onsubmit="return validateForm()">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="submit">Login</button>
            </form>

            <a href="./signup.php" class="signup-link">Don't have an account? Sign up</a>
        </div>
    </div>

    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

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
session_start(); 
?>

<?php
include('db/connection.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "select * from login where email='$email' AND password='$password'");
    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            $_SESSION['email'] = $email;
            header('location:index.php');
        } else {
            echo "<script> alert('Try Again...!')</script>";
        }
    }
}
?>