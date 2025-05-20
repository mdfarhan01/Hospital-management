<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Edit Book</h2>
    <form action="./index.php" class="bg-white p-4 rounded shadow-sm" method="POST">
      <div class="row g-3">
		<label for="patientId">Patient ID</label>
		<input type="text" id="patientId" name="patientId" placeholder="Enter patient ID" required />

		<label for="patientName">Full Name</label>
		<input type="text" id="patientName" name="patientName" placeholder="Enter full name" required />

		<label for="dob">Date of Birth</label>
		<input type="date" id="dob" name="dob" required />

		<label for="gender">Gender</label>
		<select id="gender" name="gender" required>
		<option value="" disabled selected>Select gender</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
		<option value="Other">Other</option>
		</select>

		<!-- <label for="patientImage">Upload Patient Image:</label>
		<input type="file" name="patientImage" accept="image/*" required> -->

		<label for="contactNumber">Contact Number</label>
		<input type="tel" id="contactNumber" name="contactNumber" pattern="[" placeholder="1234567890" required />

		<label for="email">Email Address</label>
		<input type="email" id="email" name="email" placeholder="example@mail.com" />

		<label for="address">Address</label>
		<textarea id="address" name="address" rows="3" placeholder="Enter full address"></textarea>

		<label for="medicalHistory">Medical History</label>
		<textarea id="medicalHistory" name="medicalHistory" rows="4" placeholder="Enter any past illnesses, allergies, medications"></textarea>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-success">Save Book</button>
        <a href="index.html" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>