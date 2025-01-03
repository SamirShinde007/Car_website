<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['email'])){
    header("location:admin_login.php");
}
?>

<?php
include('include/header.php');
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin_Dashboard</title>
</head>

<body>
  <style>
    section {
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      margin: 20px;
      height: 150px;
      width: 50%;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .content-one,
    .content-two {
      display: flex;
    }
  </style>

  <div class="content">

    <div class="content-one">

      <section id="drivers">
        <h2>Drivers</h2>
        <hr><br>
        <p>10</p>
      </section>

      <section id="vehicles">
        <h2>Vehicles</h2>
        <hr><br>
        <p>15</p>
      </section>
    </div>
    <div class="content-two">
      <section id="bookings">
        <h2>Total Bookings</h2>
        <hr><br>
        <?php
        include('db/connection.php');
        $book = "select id from cab_book ORDER BY id";
        $book_run = mysqli_query($conn, $book);
        $row = mysqli_num_rows($book_run);
        echo "<p>$row</p>";
        ?>
      </section>

      <section id="reports">
        <h2>Monthly Earning</h2>
        <hr><br>
        <p>₹ 50,000</p>
      </section>

    </div>
  </div>
</body>

</html>