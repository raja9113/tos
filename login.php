<?php
include('db.php');
include('includes/header.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        if ($user['is_admin']) {
            header('Location: admin.php');
        } else {
            header('Location: index.php');
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>Invalid credentials!</div>";
    }
}
?>
<h2>Login</h2>
<form method="POST">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<?php include('includes/footer.php'); ?>
