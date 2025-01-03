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
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .feedback {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    .feedback h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .feedback label {
        display: block;
        margin: 10px 0;
        font-weight: bold;
        text-align: left;
    }

    .feedback input {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .feedback button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .feedback textarea {
        overflow: hidden;
    }
</style>


<div class="feedback">
    <h2> Feedback</h2>
    <form action="feedback.php" method="post">
        <label for="email">email:</label>
        <input type="email" name="email" id="email" required>

        <label for="">subject:</label>
        <input type="text" id="password" name="subject" required>

        <label for="">Feedback</label>
        <textarea name="feedback" id="" cols="40" rows="6"></textarea>
        <br><br>
        <button type="submit" name="submit">feedback</button>
    </form>



    <?php
    include('./db/connection.php');
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $feedback = $_POST['feedback'];



        $query1 = mysqli_query($conn, "insert into feedback(email,subject,feedback)values('$email','$subject','$feedback')");

        if ($query1) {
            echo "<script>alert('feedback  submitted Sucessfull...!')</script>";
        } else {
            echo "<script>alert('Try Again...!')</script>";
        }
    }

    ?>