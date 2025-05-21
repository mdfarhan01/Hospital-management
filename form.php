

<?php


// echo "<pre>";
// print_r($_POST);


$error = [];



function clean_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data; // ✅ This line was missing
}


include_once 'db_connect.php';
// include_once 'get_data_from_db.php';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $patientId = $_POST['patientId'];
    $patientName = $_POST['patientName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $medicalHistory = $_POST['medicalHistory'];


    $sql = "INSERT INTO `patient_management_table` (`Patient ID`, `Patient Name`, `Date of Birth`, `Gender`, `Contact Number`, `Email`, `Address`, `Medical History`) VALUES ('$patientId','$patientName', '$dob', '$gender', '$contactNumber', '$email', '$address', '$medicalHistory');";
     
     
     if ($conn->query($sql) === TRUE) {
        echo "New book patient successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}






if(empty($_POST['patientId'])){
    $error['patientId'] = "Patient ID field is required";
}
if(empty($_POST['patientName'])){
    $error['patientName'] = "patient Name field is required";
}
if(empty($_POST['dob'])){
    $error['dob'] = "Date of Birth field is required";
}
if(empty($_POST['gender'])){
    $error['gender'] = "Gender field is required";
}
if(empty($_POST['contactNumber'])){
    $error['contactNumber'] = "Contact Number field is required";
}

// if(!preg_match("/^[0-9]{10}$/", $_POST['contactNumber'])){
//     $error['contactNumber'] = "Invalid contact number format. It should be 10 digits.";
// }
if(empty($_POST['email'])){
    $error['email'] = "Email field is required";
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $error['email'] = "Invalid email format";
}

if(empty($_POST['address'])){
    $error['address'] = "Address field is required";
}
if(empty($_POST['medicalHistory'])){
    $error['medicalHistory'] = "Medical History field is required";
}
if(!empty($error)){
    foreach($error as $key => $value){
        echo "<div class='alert alert-danger'>".$value."</div>";
    }
    exit;
}

$patientId = !empty($_POST['patientId']) ? clean_input($_POST['patientId']) : '';
$patientName = !empty($_POST['patientName']) ? clean_input($_POST['patientName']) : '';
$dob = !empty($_POST['dob']) ? clean_input($_POST['dob']) : null;
$gender = !empty($_POST['gender']) ? clean_input($_POST['gender']) : null;

$contactNumber = !empty($_POST['contactNumber']) ? clean_input($_POST['contactNumber']) : '';
$email = !empty($_POST['email']) ? clean_input($_POST['email']) : '';
$address = !empty($_POST['address']) ? clean_input($_POST['address']) : '';
$medicalHistory = !empty($_POST['medicalHistory']) ? clean_input($_POST['medicalHistory']) : '';



if (count($error) == 0) {
echo "Patient ID: " . $patientId . "<br>";
echo "Patient Name: " . $patientName . "<br>";
echo "Date of Birth: " . $dob . "<br>";
echo "Gender: " . $gender . "<br>";

echo "Contact Number: " . $contactNumber . "<br>";
echo "Email: " . $email . "<br>";
echo "Address: " . $address . "<br>";
echo "Medical History: " . $medicalHistory . "<br>";
}




echo "<pre>";
print_r( $error );
die();


?>