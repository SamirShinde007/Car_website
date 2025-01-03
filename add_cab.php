<?php include('./include/header.php');
?>


<link rel="stylesheet" href="./style/admin.css">


<div class="content">
  <div class="box1">
    <form action="./add_cab.php" method="post">
      <h2>Add cab with details</h2>
      <label for="">vehical Name</label>
      <input type="text" name="cab_name">
      <label for="">cab number</label>
      <input type="text" name="cab_no">
      <label for="">location from - to</label>
      <input type="text" name="location">
      <label for="">km</label>
      <input type="text" name="km">
      <label for="">price</label>
      <input type="text" name="price">
      <label for="">driver Name</label>
      <input type="text" name="dri_name">
      <label for="">driver no</label>
      <input type="text" name="dri_no">
      <br>
      <br>
      <button type="reset">reset</button>
      <button type="submit" name="submit">add cab</button>
    </form>
  </div>
</div>

<?php
include('./db/connection.php');
if (isset($_POST['submit'])) {
  $cab_name = $_POST['cab_name'];
  $cab_no = $_POST['cab_no'];
  $location = $_POST['location'];
  $km = $_POST['km'];
  $price = $_POST['price'];
  $dri_name = $_POST['dri_name'];
  $dri_no = $_POST['dri_no'];


  $query1 = mysqli_query($conn, "insert into addcabdetails(cab_name,cab_no,location,km,price,dri_name,dri_no)values('$cab_name','$cab_no','$location','$km','$price','$dri_name','$dri_no')");

  if ($query1) {
    echo "<script>alert('data saved  Sucessfull...!')</script>";
  } else {
    echo "<script>alert('Try Again...!')</script>";
  }
}
?>