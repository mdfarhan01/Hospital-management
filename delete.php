<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Patient</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card p-4 shadow-sm text-center">
      <h4 class="mb-3 text-danger">Are you sure you want to delete this Patient?</h4>
      <p><strong>The Alchemist by Paulo Coelho</strong></p>
      <form>
        <input type="hidden" name="id" value="1">
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
      </form>
    </div>
  </div>
</body>
</html>