<?php
$username = "hifzaaxw_tos";
$password = "Toskie@1234";
$dbname = "hifzaaxw_tos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
