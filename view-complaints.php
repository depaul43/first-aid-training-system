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
$response_text = $_POST['response_text'];

// Insert response into database
$stmt = $mysqli->prepare("INSERT INTO response (complaint_id, response_text) VALUES (?, ?)");
$stmt->bind_param("is", $complaint_id, $response_text);
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
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
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
<th>Response Text </th>
</tr>
</thead>
<tbody>
<?php if (empty($complaints)) { ?>
    <tr>
        <td colspan="6">No complaints found.</td>
    </tr>
<?php } else { ?>
    <?php foreach ($complaints as $complaint) { ?>
        <tr>
            <td><?php echo $complaint['complaint_id']; ?></td>
            <td><?php echo $complaint['complaint_type']; ?></td>
            <td><?php echo $complaint['complaint_description']; ?></td>
            <td><?php echo $complaint['complaint_date']; ?></td>
            <td>
                <?php if (!empty($complaint['response_text'])) { ?>
                    <?php echo $complaint['response_text']; ?>
                <?php } else { ?>
                    Not responded
                <?php } ?>
            </td>
            <td>
                <?php if (!empty($complaint['response_text'])) { ?>
                    <button disabled>Respond</button>
                <?php } else { ?>
                    <form class="response-form" method="POST" action="respond.php" onsubmit="return submitResponse(this)">
                        <input type="hidden" name="complaint_id" value="<?php echo $complaint['complaint_id']; ?>">
                        <textarea name="response" id="response" rows="1" cols="50" required <?php if(isset($complaint['response_text'])) {echo 'disabled';} ?>><?php if(isset($complaint['response_text'])) {echo 'Responded';} ?></textarea>
                        <button type="submit" onclick="document.getElementsByName('response_type')[0].options[1].text = 'Responded';" <?php if(isset($complaint['response_text'])) {echo 'disabled';} ?>>Respond</button>
                    </form>

                    <script>
                        function submitResponse(form) {
                            // Submit the form via AJAX to respond.php
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                    // If the response was successful, hide the row containing the complaint
                                    form.closest('tr').style.display = 'none';
                                }
                            }
                            xhr.open(form.method, form.action, true);
                            xhr.send(new FormData(form));
                            return false; // Prevent the form from submitting normally
                        }
                    </script>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
<?php } ?>

</tbody>
</table>
</div>
</body>
</html> 
