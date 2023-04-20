<!DOCTYPE html>
<html>

<head>
    <title>First Aid Training System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="style/style.css" rel="stylesheet">
    <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url(images/2210-removebg-preview.png);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
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

<h2>FIRST AID TRAINING SYSTEM</h2>
<div class="logo-container">
      <img src="images/logo.png" alt="logo">
    </div>
    <div class="form-container">
    <form action="connection.php" method="post">
      <table>
        <label>Reg Num:</label>
        <input type="text" name="RegNum" required><br><br>

        <label>First Name:</label>
        <input type="text" name="FirstName" required><br><br>

        <label>Middle Name:</label>
        <input type="text" name="MiddleName"><br><br>

        <label>Last Name:</label>
        <input type="text" name="LastName" required><br><br>

        <label>Email Address:</label>
        <input type="text" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="Password" required><br><br>

        <label>Confirm Password:</label>
        <input type="password" name="ConfirmPassword" required><br><br>

        <label>Gender:</label>
        <input type="radio" name="Gender" value="M" required>Male
        <input type="radio" name="Gender" value="F" required>Female
        <input type="radio" name="Gender" value="O" required>Others
        <br><br>

        <input type="submit" name="register" value="Register">
        <p>Already have an account? <a href="index.php"> Login </a></p>
    </form>
</table>
</body>

</html>