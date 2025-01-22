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
        <h2>Working Location</h2>
        <form action="location_info.php" method="post">
            <label for="">Working Locations:</label>
            <input type="text" name="city_name" required>
            <br><br>
            <button type="submit" name="submit"> Working Location</button>
        </form>
    </div>

    <div class="box3">
        <h2> Location Details</h2>
        <table>
            <tr>
                <th>id</th>
                <th>city_name</th>
                <th>delete</th>
            </tr>
            <?php
            include('db/connection.php');

            if (isset($_POST['submit'])) {
                $city_name = $_POST['city_name'];
                $query1 = mysqli_query($conn, "insert into working_locations(city_name) values('$city_name')");
                if ($query1) {
                    echo "<script>alert('Location submitted successfully!')</script>";
                } else {
                    echo "<script>alert('Try Again!')</script>";
                }
            }

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
</body>
</html>