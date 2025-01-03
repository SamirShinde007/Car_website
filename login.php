<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/new.css">
</head>

<body>

    </head>

    <body>
        <div class="login">

            <div class="login-container">
                <h2> Login</h2>
                <form id="loginForm" action="login.php" method="post">
                    <label for="email">email:</label>
                    <input type="email" name="email" id="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit" name="submit">Login</button>
                </form>

                <a href="./signup.php" class="signup-link">Don't have an account? Sign up</a>
            </div>
        </div>

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