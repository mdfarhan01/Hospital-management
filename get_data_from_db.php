<?php
include_once './db_connect.php';

$get_data = [];
$sql = "SELECT * FROM `patient_management_table`";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $get_data[] = $row;
    }
}


error_reporting(E_ALL);
ini_set('display_errors', 1);


if (!isset($get_data) || !is_array($get_data)) {
    $get_data = [];
}




?>
