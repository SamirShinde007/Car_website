


<?php
include('db/connection.php');
$id = $_GET['del'];
$query = mysqli_query($conn, "delete from addcabdetails where id='$id'");

if ($query) {
    echo  "<script> alert('cab details Has Been Deleted....!')</script>";
    header('location:home.php');
} else {
    echo  "<script> alert('Please Try Again.....!')</script>";
}
?>



<?php
include('db/connection.php');
$query = mysqli_query($conn, "delete from cab_book where id='$id'");

if ($query) {
    echo  "<script> alert('cab booking details Has Been Deleted....!')</script>";
    header('location:home.php');
} else {
    echo  "<script> alert('Please Try Again.....!')</script>";
}
?>



<?php
include('db/connection.php');
$query = mysqli_query($conn, "delete from feedback where id='$id'");

if ($query) {
    echo  "<script> alert('Feedback Has Been Deleted....!')</script>";
    header('location:home.php');
} else {
    echo  "<script> alert('Please Try Again.....!')</script>";
}
?>


<?php
include('db/connection.php');
$query = mysqli_query($conn, "delete from working_locations where id='$id'");

if ($query) {
    echo  "<script> alert('working location details Has Been Deleted....!')</script>";
    header('location:home.php');
} else {
    echo  "<script> alert('Please Try Again.....!')</script>";
}
?>