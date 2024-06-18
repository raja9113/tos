<?php
include('db.php');
include('includes/header.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $vendor_id = $_POST['vendor_id'];
    $item_id = $_POST['item_id'];
    $time_slot = $_POST['time_slot'];

    $query = "INSERT INTO bookings (user_id, vendor_id, item_id, time_slot) VALUES ('$user_id', '$vendor_id', '$item_id', '$time_slot')";
    mysqli_query($conn, $query);

    echo "<div class='alert alert-success' role='alert'>Booking successful!</div>";
}
?>
<h2>Book a Service</h2>
<form method="POST">
    <input type="hidden" name="vendor_id" value="1"> <!-- Replace with dynamic vendor_id -->
    <div class="form-group">
        <label for="item_id">Select Item</label>
        <select name="item_id" id="item_id" class="form-control" required>
            <option value="1">Item 1</option> <!-- Replace with dynamic items -->
            <option value="2">Item 2</option>
        </select>
    </div>
    <div class="form-group">
        <label for="time_slot">Select Time Slot</label>
        <input type="datetime-local" class="form-control" id="time_slot" name="time_slot" required>
    </div>
    <button type="submit" class="btn btn-primary">Book</button>
</form>
<?php include('includes/footer.php'); ?>
