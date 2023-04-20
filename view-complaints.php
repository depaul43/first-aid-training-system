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
  $complaint_id = $_POST['complaint_id'];
  $response = $_POST['response'];

  // Insert response into database
  $stmt = $mysqli->prepare("UPDATE complaints SET response = ? WHERE complaint_id = ?");
  $stmt->bind_param("si", $response, $complaint_id);
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
        <th>Complaint Name</th>
        <th>Complaint Description</th>
        <th>Response</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($complaints as $complaint) { ?>
        <tr>
          <td><?php echo $complaint['complaint_id']; ?></td>
          <td><?php echo $complaint['complaint_name']; ?></td>
          <td><?php echo $complaint['complaint_description']; ?></td>
          <td>
            <?php if (!empty($complaint['response'])) { ?>
              <?php echo $complaint['response']; ?>
            <?php } else { ?>
              <form class="response-form" method="POST">
                <input type="hidden" name="complaint_id" value="<?php echo $complaint['complaint_id']; ?>">
                <select name="response" id="response">
                  <option value="">-- Select an option --</option>
                  <option value="Check your internet connection">Check your Internet connection</option>
                  <option value="Please be patient, the quizzes will be available soon">Please be patient, the quizzes will be available soon</option>
                  <option value="Our team will get back to your shortly">Our team will get back to your shortly</option>
                  <option value="Please be patient, new modules will be uploaded">Please be patient, new modules will be uploaded</option>
                  <option value="Contact the University Emergency team: See contact us tab">Contact the University Emergency team: See contact us tab</option>
                </select>
                <input type="submit" value="Send">
              </form>
              <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
        </div>
    </div>
    </div>
</div>
</div>
</html>
