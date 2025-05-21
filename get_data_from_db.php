<?php




include_once 'db_connect.php';
// include_once 'get_data_from_db.php';


// Check if the form is submitted
$sql = "SELECT * FROM `patient_management_table`";
$result = mysqli_query($conn, $sql);

if ($result) {
    $get_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . mysqli_error($conn);
}



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $get_data = [];
    $sql = "SELECT * FROM `patient_management_table`";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $get_data[] = $row;
      }
    }



?>
