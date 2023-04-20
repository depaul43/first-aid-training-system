<?php

// Connect to the database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'fts';

$mysqli = new mysqli($host, $user, $password, $dbname);
if ($mysqli->connect_error) {
  die('Connect Error (' . $mysqli->connect_errno . ') '
    . $mysqli->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $module_id = $_POST['module_id'];
  $module_name = $_POST['module_name'];
  $module_description=$_POST['module_description'];
  $module_file=$_POST['module_file'];

  // Handle file upload
if ($_FILES['module_file']['error'] === UPLOAD_ERR_OK) {
  $file_name = $_FILES['module_file']['name'];
  $file_tmp = $_FILES['module_file']['tmp_name'];
  $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
  $allowed_exts = ['pdf', 'doc', 'docx', 'txt'];
  if (in_array($file_ext, $allowed_exts)) {
    $upload_path = 'uploads/';
    $file_dest = $upload_path . $file_name;
    move_uploaded_file($file_tmp, $file_dest);
    $module_file = $file_dest;
  } else {
    $errors[] = 'Only PDF, DOC, DOCX, and TXT files are allowed.';
  }
} else {
  $module_file = '';
}

  // Validate form data
  $errors = [];
  if (empty($module_id)) {
    $errors[] = 'Module id is required.';
  }
  if (empty($module_name)) {
    $errors[] = 'Module name is required.';
  }
  if (empty($module_description)) {
    $errors[] = 'Module description is required.';
  }
  if (empty($module_file)) {
    $errors[] = 'Module file is required.';
  }

  // Insert data into database if no errors
  if (empty($errors)) {
    $stmt = $mysqli->prepare("INSERT INTO modules (module_id, module_name, module_description, module_file) 
    VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $module_id, $module_name, $module_description, $module_file);
    $stmt->execute();
    $stmt->close();

    // Set success message
    if (mysqli_query($conn, $sql)) {
      // Add success notification popup and redirect
      echo "<script>alert('Module submitted successfully!')</script>";
      echo "<script>window.location = 'admin.php'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Training Module</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    h1 {
      text-align: center;
      margin-top: 30px;
    }
    form {
      margin: 30px auto;
      max-width: 600px;
    }
    label {
      display: block;
      margin-bottom: 10px;
    }
    input[type="text"],
    textarea {
      display: block;
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 20px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }
    li {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <h1>Add Training Module</h1>

  <?php if (!empty($errors)) { ?>
    <ul>
      <?php foreach ($errors as $error) { ?>
        <li><?php echo $error; ?></li>
      <?php } ?>
    </ul>
  <?php } ?>

  <form method="POST" enctype="multipart/form-data">
  <label for="module_id">Module ID:</label>
  <input type="text" id="module_id" name="module_id" required>
  <br><br>
  <label for="module_name">Module Name:</label>
  <input type="text" id="module_name" name="module_name" required>
  <br><br>
  <label for="module_description">Module Description:</label>
  <textarea id="module_description" name="module_description" required></textarea>
  <br><br>
  <label for="module_file">Module File:</label>
  <input type="file" id="module_file" name="module_file">
  <br><br>
  <input type="submit" value="Add Module">
</form>


