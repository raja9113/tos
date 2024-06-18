<?php
include('db.php');
include('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
    mysqli_query($conn, $query);

    echo "<div class='alert alert-success' role='alert'>Registration successful!</div>";
}
?>
<h2>Register</h2>
<form method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
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
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
<?php include('includes/footer.php'); ?>
