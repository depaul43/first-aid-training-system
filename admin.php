<!DOCTYPE html>
<html>
  <head>
    <title>Admin Dashboard</title>
    
    <style>
      .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0px 2px 2px #ccc;
        display: inline-block;
        margin: 10px;
        padding: 10px;
        text-align: center;
        width: 200px;
      }
      
      .card a {
        color: #333;
        text-decoration: none;
      }
      
      .logout {
        float: right;
        margin-right: 10px;
        
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
  <a href="adminlogin.php" class="logout">Logout</a>
  <div class="card">
    <a href="study-modules.php">Add Study Modules</a>
  </div>
  <div class="card">
    <a href="add-quiz.php">Add Quizzes</a>
  </div>
  <div class="card">
    <a href="view-complaints.php">View Complaints</a>
  </div>
  
  <section>
  <div class="footer">&copy; 2023 First Aid Training System</div>
  </section>
</body>
</html>
