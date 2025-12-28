<?php
include "db.php";
$id = $_GET['id'];
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Assign Request</h2>

<form method="post">
    <select name="staff_id">
        <option value="">Select Staff</option>
        <?php
        $staff = mysqli_query($conn, "SELECT * FROM users WHERE role='staff'");
        while ($s = mysqli_fetch_assoc($staff)) {
            echo "<option value='{$s['id']}'>{$s['username']}</option>";
        }
        ?>
    </select>
    <button name="assign">Assign</button>
</form>

<?php
if (isset($_POST['assign'])) {
    $staff_id = $_POST['staff_id'];
    mysqli_query($conn,
        "UPDATE maintenance_requests SET assigned_to='$staff_id', status='In Progress' WHERE id='$id'");
    header("Location: admin_dashboard.php");
}
?>
</div>
