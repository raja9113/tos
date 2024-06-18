<?php
include('db.php');
include('includes/header.php');
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_vendor'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];

    $query = "INSERT INTO vendors (name, description, email, phone, website) VALUES ('$name', '$description', '$email', '$phone', '$website')";
    mysqli_query($conn, $query);

    echo "<div class='alert alert-success' role='alert'>Vendor added successfully!</div>";
}
?>
<h2>Admin Panel</h2>
<h3>Add Vendor</h3>
<form method="POST">
    <div class="form-group">
        <label for="name">Vendor Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Vendor Name" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
    </div>
    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" id="website" name="website" placeholder="Website" required>
    </div>
    <button type="submit" name="add_vendor" class="btn btn-primary">Add Vendor</button>
</form>
<?php include('includes/footer.php'); ?>
