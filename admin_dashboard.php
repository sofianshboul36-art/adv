<?php include "db.php"; ?>
<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Admin Dashboard</h2>
<a href="logout.php">Logout</a>
<hr>

<?php
$q = mysqli_query($conn, "SELECT * FROM maintenance_requests");
while ($r = mysqli_fetch_assoc($q)) {
    echo "Request ID: {$r['id']}<br>";
    echo "Status: {$r['status']}<br>";
    echo "<a href='assign_request.php?id={$r['id']}'>Assign</a> |
          <a href='update_status.php?id={$r['id']}'>Update Status</a><hr>";
}
?>
</div>
