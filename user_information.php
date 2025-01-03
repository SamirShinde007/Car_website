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

        <h2>All user information  details</h2>

        <table>
            <tr>
                <th>id</th>
                <th>username</th>
                <th>mobile no</th>
                <th>email</th>
                <th>password</th>
            </tr>
            <?php
            include('db/connection.php');

            $query = mysqli_query($conn, "select * from login");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['mobileno']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>*********</td>
                </tr>


            <?php } ?>

        </table>

    </div>

</div>