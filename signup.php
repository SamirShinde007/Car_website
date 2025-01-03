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
        <form method="post" action="signup.php">
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
</body>

</html>


<?php
include('./db/connection.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];



    $query1 = mysqli_query($conn, "insert into login(username,email,password)values('$username','$email','$password')");

    if ($query1) {
        echo "<script>alert('Sign In Sucessfull...!')</script>";
        header('location:login.php');
    } else {
        echo "<script>alert('Try Again...!')</script>";
    }
}

?>