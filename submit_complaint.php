<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fts";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$complaint_name = $_POST['complaint_name'];
$complaint_type = $_POST['complaint_type'];
$complaint_description = $_POST['complaint_description'];
$date_created = $_POST['date_created'];

// Insert data into database
$sql = "INSERT INTO complaints (complaint_name, complaint_type, complaint_description, date_created) 
VALUES ('$complaint_name', '$complaint_type', '$complaint_description', '$date_created')";

if (mysqli_query($conn, $sql)) {
  // Add success notification popup and redirect
  echo "<script>alert('Complaint submitted successfully!')</script>";
  echo "<script>window.location = 'dashboard.php'</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
