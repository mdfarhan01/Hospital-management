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
?>
