<?php
session_start();
error_reporting(0);

// Check if admin is logged in
if (!isset($_SESSION['email'])) {
    header("location:admin_login.php");
}
?>

<?php
include('include/header.php');
include('db/connection.php');
error_reporting(0);
?>

<link rel="stylesheet" href="./style/admin.css">

<div class="content">
    <div class="box3">
        <h2>Booking Details</h2>

        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile No</th>
                <th>Date-Time</th>
                <th>Family Members</th>
                <th>Cab Type</th>
                <th>Location From</th>
                <th>Location To</th>
                <th>Total Distance</th>
                <th>Total Cost</th>
                <th>Maps</th>
                <th>Payment</th>
                <th>Delete</th>
            </tr>

            <?php
            // Pagination Logic
            $results_per_page = 5;  // Number of results per page
            $query = mysqli_query($conn, "SELECT * FROM cab_bookings");
            $total_results = mysqli_num_rows($query);
            $total_pages = ceil($total_results / $results_per_page);

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $start_limit = ($page - 1) * $results_per_page;
            $query = mysqli_query($conn, "SELECT * FROM cab_bookings LIMIT " . $start_limit . ',' . $results_per_page);

            // Display cab bookings
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['mobileno']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_time']); ?></td>
                    <td><?php echo htmlspecialchars($row['family_members']); ?></td>
                    <td><?php echo htmlspecialchars($row['cab_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['location_from']); ?></td>
                    <td><?php echo htmlspecialchars($row['location_to']); ?></td>
                    <td><?php echo htmlspecialchars($row['total_distance']); ?> km</td>
                    <td><?php echo htmlspecialchars($row['total_cost']); ?> rs</td>
                    <td style="width: 150px; height:150px;">
                        <iframe src="https://www.google.com/maps?q=<?php echo $row['latitude']; ?>,<?php echo $row['longitude']; ?>&hl=es;z=14&output=embed" 
                                style="width:100%;height:100%;" frameborder="0"></iframe>
                    </td>
                    <td>Pending</td>
                    <td><a href="cabinfo_delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php } ?>
        </table>

        <!-- Pagination Controls -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="book_info.php?page=<?php echo $page - 1; ?>">&#8592; Prev</a>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="book_info.php?page=<?php echo $i; ?>" class="<?php echo ($page == $i) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
            
            <?php if ($page < $total_pages): ?>
                <a href="book_info.php?page=<?php echo $page + 1; ?>">Next &#8594;</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
