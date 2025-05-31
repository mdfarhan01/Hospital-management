<?php 

include_once 'db_connect.php';

if (!isset($_GET['id'])) {
    die("Patient ID not provided.");
}

$patientId = $_GET['id'];

$sql = "SELECT * FROM `patient_management_table` WHERE `Patient ID` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $patientId);
$stmt->execute();
$result = $stmt->get_result();

?>