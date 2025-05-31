<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Patient</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Add New Patient</h2>
    <form action="form.php" class="bg-white p-4 rounded shadow-sm" method="POST">
      <div class="row g-3">
        <!-- <label for="patientId">Patient ID</label>
        <input type="text" id="patientId" name="patientId" class="form-control" required> -->

        <label for="patientName">Full Name</label>
        <input type="text" id="patientName" name="patientName" class="form-control" required>

        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" class="form-control" required>

        <label for="gender">Gender</label>
        <select id="gender" name="gender" class="form-control" required>
          <option value="" disabled selected>Select gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>

		<!-- <label for="image">Image</label>
		<input type="file" id="image" name="image" class="form-control" accept="image/*"> -->

        <label for="contactNumber">Contact Number</label>
        <input type="tel" id="contactNumber" name="contactNumber" class="form-control" required>

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" class="form-control" required>

        <label for="address">Address</label>
        <textarea id="address" name="address" class="form-control" rows="3"></textarea>

        <label for="medicalHistory">Medical History</label>
        <textarea id="medicalHistory" name="medicalHistory" class="form-control" rows="4"></textarea>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-success">Save Patient</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>