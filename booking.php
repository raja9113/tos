<?php
include('db.php');
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Handle booking
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $vendor_id = $_POST['vendor_id'];
    $item_id = $_POST['item_id'];
    $time_slot = $_POST['time_slot'];

    $query = "INSERT INTO bookings (user_id, vendor_id, item_id, time_slot) VALUES ('$user_id', '$vendor_id', '$item_id', '$time_slot')";
    mysqli_query($conn, $query);

    // Send email or SMS notification
    echo "Booking successful!";
}

// Booking form
?>
<form method="POST">
    <input type="hidden" name="vendor_id" value="1"> <!-- Replace with dynamic vendor_id -->
    <select name="item_id" required>
        <option value="1">Item 1</option> <!-- Replace with dynamic items -->
        <option value="2">Item 2</option>
    </select>
    <input type="datetime-local" name="time_slot" required>
    <button type="submit">Book</button>
</form>