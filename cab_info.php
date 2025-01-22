<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['email'])){
    header("location:admin_login.php");
}
?>

<?php
include('include/header.php');
error_reporting(0);
?>

<link rel="stylesheet" href="./style/admin.css">


<div class="content">
    <div class="box3">

        <h2>Cab With Details</h2>

        <table>
            <tr>
                <th>id</th>
                <th>cab_name</th>
                <th>cab_no</th>
                <th>location</th>
                <th>km</th>
                <th>price</th>
                <th>dri_name</th>
                <th>dri_no</th>
                <th>delete</th>
            </tr>

            <?php
            include('db/connection.php');

            $query = mysqli_query($conn, "select * from addcabdetails");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['cab_name']; ?></td>
                    <td><?php echo $row['cab_no']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['km']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['dri_name']; ?></td>
                    <td><?php echo $row['dri_no']; ?></td>

                    <td><a href="cabinfo_delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a></td>

                </tr>


            <?php } ?>

        </table>

    </div>
</div>