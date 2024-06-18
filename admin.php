<?php
include('db.php');
session_start();

// Ensure only admin access
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Add Vendor
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_vendor'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];

    $query = "INSERT INTO vendors (name, description, email, phone, website) VALUES ('$name', '$description', '$email', '$phone', '$website')";
    mysqli_query($conn, $query);

    echo "Vendor added successfully!";
}

// Form for adding vendors
?>
<form method="POST">
    <input type="text" name="name" placeholder="Vendor Name" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <input type="text" name="website" placeholder="Website" required>
    <button type="submit" name="add_vendor">Add Vendor</button>
</form>