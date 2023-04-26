<?php
// Connect to the database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'first';

$mysqli = new mysqli($host, $user, $password, $dbname);
if ($mysqli->connect_error) {
die('Connect Error (' . $mysqli->connect_errno . ') '
. $mysqli->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Get form data
$complaint_id = $_POST['complaint_id'];
$response = $_POST['response'];

// Insert response into database
$stmt = $mysqli->prepare("INSERT INTO response (complaint_id, response) VALUES (?, ?)");
$stmt->bind_param("is", $complaint_id, $response);
$stmt->execute();
$stmt->close();
}

// Get all complaints from database
$result = $mysqli->query("SELECT * FROM complaints");
$complaints = $result->fetch_all(MYSQLI_ASSOC);
$result->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>View Complaints</title>
<style>
table {
border-collapse: collapse;
width: 100%;
}

th, td {
text-align: left;
padding: 8px;
}

tr:nth-child(even) {
background-color: #f2f2f2;
}

h1 {
font-size: 28px;
margin-bottom: 20px;
}

.response-form {
margin-top: 20px;
margin: 0 auto;
}

.response-form label {
display: block;
margin-bottom: 5px;
}

.response-form textarea {
width: 100%;
height: 100px;
margin-bottom: 10px;
}

.response-form input[type=submit] {
padding: 10px;
background-color: #4CAF50;
border: none;
color: white;
cursor: pointer;
font-size: 16px;
}

.response-form input[type=submit]:hover {
background-color: #45a049;
}
</style>
</head>
<body>
<div class="bg-dark">
<div class="row my-3">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h2 class="def-heading text-center">View Complaints</h2>
</div>
<div class="card-body center">
<table>
<thead>
<tr>
<th>Complaint ID</th>
<th>Complaint Type</th>
<th>Complaint Description</th>
<th>Complaint Date</th>
<th>Response </th>
</tr>
</thead>
<tbody>
<?php foreach ($complaints as $complaint) { ?>
<tr>
<td><?php echo $complaint['complaint_id']; ?></td>
<td><?php echo $complaint['complaint_type']; ?></td>
<td><?php echo $complaint['complaint_description']; ?></td>
<td><?php echo $complaint['complaint_date']; ?></td>
<td>
<?php if (!empty($complaint['response'])) { ?>
<?php echo $complaint['response']; ?>
<?php } else { ?>
<form class="response-form" method="POST" action="respond.php">
<input type="hidden" name="complaint_id" value="<?php echo $complaint['complaint_id']; ?>">
<select name="response_type" required>
<option value="" selected disabled>Select response type</option>
<option value="Please check your Internet connection">Please check your Internet connection</option>
<option value="Please refresh your page to load the module again">Please refresh your page to load the module again</option>
<option value="New modules will be updated in due course">New modules will be updated in due course</option>
<option value="Check on the contact tab to get in touch with us">Check on the contact tab to get in touch with us</option>
</select>
<button type="submit">Respond</button>
</form>

<?php } ?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</body>
</html> 
