<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    h1 {
      color: #333;
      text-align: center;
      margin-top: 50px;
    }

    form {
      width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
      color: #333;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-bottom: 20px;
      font-size: 16px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #3e8e41;
    }

    p {
      color: #f00;
      margin-bottom: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>Admin</h1>
  <?php
session_start();

// Set the correct username and password
$correct_username = "Admin";
$correct_password = "37431595";

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if the username and password are correct
  if ($username === $correct_username && $password === $correct_password) {
    // Set the session variable
    $_SESSION['admin'] = true;

    // Redirect to the admin page
    header("Location: admin.php");
    exit();
  } else {
    // Display an error message
    $error_message = "Incorrect username or password.";
  }
}
?>
  <form method="post">
    <label>Username:</label>
    <input type="text" name="username" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="submit" value="Login">
  </form>
</body>
</html>
