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

        <h2>All cab booking details</h2>

        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>mobile no</th>
                <th>date</th>
                <th>members</th>
                <th>vehical</th>
                <th>location-from</th>
                <th>location-to</th>
                <th>payment</th>
                <th>Maps</th>
                <th>Status</th>
                <th>delete</th>
            </tr>
            <?php
            include('db/connection.php');

            $query = mysqli_query($conn, "select * from cab_book");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['mobileno']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['members']; ?></td>
                    <td><?php echo $row['vehical']; ?></td>
                    <td><?php echo $row['location_start']; ?></td>
                    <td><?php echo $row['location_end']; ?></td>
                    <td><?php echo $row['payment']; ?></td>
                    <td style="width: 150px; height:150px;"><iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; ?>&hl=es;z=14&output=embed' style="width:100%;height:100%" frameborder="0"></iframe></td>
                    <td>Pending</td>
                    <td><a href="cabinfo_delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a></td>
                </tr>


            <?php } ?>

        </table>
    </div>
</div>