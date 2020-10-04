<?php
require('config.php');

// get Users
$query = "SELECT id, item_name, description, price, location, category FROM items";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Items.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('No', 'Name', 'Description', 'Price', 'Location', 'Category'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
echo "<script> window.location.href = 'master.php'; </script>";
?>
