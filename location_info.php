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

        <h2>All location details</h2>

        <table>
            <tr>
                <th>id</th>
                <th>city_name</th>
                <th>delete</th>

            </tr>
            <?php
            include('db/connection.php');

            $query = mysqli_query($conn, "select * from working_locations");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['city_name']; ?></td>

                    <td><a href="cabinfo_delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a></td>

                </tr>


            <?php } ?>

        </table>

    </div>

</div>