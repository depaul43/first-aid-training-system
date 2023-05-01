<!DOCTYPE html>
<html>
  <head>
    <title>Admin Dashboard</title>
    
    <style>
          body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url(images/admin.png);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }
      .card {
      margin: 1rem;
      padding: 1rem;
      background-color: #f7f7f7;
      border-radius: 0.5rem;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
      
      .card a {
        color: #333;
        font-size: 1.2rem;
        text-decoration: none;
        transition: color 0.3s ease-in-out;
      }
      
         .card a:hover {
          color: #666;
          }
      
      .logout {
        float: right;
        margin-right: 10px;
        font-size: 1.2rem;
        color: #fff;
        text-decoration: none;
        background-color: #333;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        
      }

      .logout-btn {
        background-color: #f44336;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        padding: 10px;
        position: absolute;
        top: 10px;
        right: 10px;
      }

      .logout-btn:hover {
        background-color: #d32f2f;
      }
      
      .logout-btn:focus {
        outline: none;
      }

      .footer {
        background-color: #eee;
        font-size: 12px;
        padding: 10px;
        text-align: center;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
      }
      /* Navbar */
.navbar {
  display: flex;
  justify-content: flex-end;
  padding: 1rem;
}

/* Card Container */
.card-container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  margin-top: 2rem;
}
    </style>
  </head>
  <body>
  <!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
</head>
<body>
  <h1>Admin Dashboard</h1>
  <?php
session_start();

// Check if the 'admin' session variable has been set
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
  // Redirect to the login page
  header("Location: adminlogin.php");
  exit();
}
?>
  <div class="navbar">
  <a href="adminlogin.php" class="logout">Logout</a>
</div>

<div class="card-container">
  <div class="card">
    <a href="study-modules.php">Add Study Modules</a>
  </div>
  
  <div class="card">
    <a href="view-complaints.php">View Complaints</a>
  </div>
</div>

  
  <section>
  <div class="footer">&copy; 2023 First Aid Training System</div>
  </section>
</body>
</html>
