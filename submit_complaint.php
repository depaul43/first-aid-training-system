<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "first";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$complaint_type = $_POST['complaint_type'];
$complaint_description = $_POST['complaint_description'];
$complaint_date = date('Y-m-d H:i:s');

// Insert data into database
$sql = "INSERT INTO complaints (complaint_type, complaint_description, complaint_date) 
VALUES ('$complaint_type', '$complaint_description', '$complaint_date')";

if (mysqli_query($conn, $sql)) {
  // Add success notification popup and redirect
  echo "<script>alert('Complaint submitted successfully!')</script>";
  echo "<script>window.location = 'dashboard.php'</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
