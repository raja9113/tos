<?php
include('db.php');
include('includes/header.php');

$vendor_id = $_GET['vendor_id'];

$vendor_query = "SELECT * FROM vendors WHERE id='$vendor_id'";
$vendor_result = mysqli_query($conn, $vendor_query);
$vendor = mysqli_fetch_assoc($vendor_result);

$categories_query = "SELECT * FROM categories WHERE vendor_id='$vendor_id'";
$categories_result = mysqli_query($conn, $categories_query);

echo "<h1>{$vendor['name']}</h1>";
echo "<p>{$vendor['description']}</p>";

while ($category = mysqli_fetch_assoc($categories_result)) {
    echo "<h2>{$category['name']}</h2>";
    $items_query = "SELECT * FROM items WHERE category_id='{$category['id']}'";
    $items_result = mysqli_query($conn, $items_query);
    while ($item = mysqli_fetch_assoc($items_result)) {
        echo "<p>{$item['name']} - {$item['price']}</p>";
    }
}

include('includes/footer.php');
?>
