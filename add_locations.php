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


<link rel="stylesheet" href="./style/admin.css">



<div class="content">

    <div class="box1">
        <h2> Add working location</h2>
        <form action="add_locations.php" method="post">

            <label for="">Working Locations:</label>
            <input type="text" name="city_name" required>

            <br><br>
            <button type="submit" name="submit">Add Working Location</button>
        </form>

    </div>
</div>


<?php
include('./db/connection.php');
if (isset($_POST['submit'])) {
    $city_name = $_POST['city_name'];




    $query1 = mysqli_query($conn, "insert into working_locations(city_name)values('$city_name')");

    if ($query1) {
        echo "<script>alert('location  submitted Sucessfull...!')</script>";
    } else {
        echo "<script>alert('Try Again...!')</script>";
    }
}

?>