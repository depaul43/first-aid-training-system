<?php
include 'connection.php';
$admno = $_SESSION['regno'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>First Aid Training Dashboard</title>
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" 
    integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous" />

    <style>
        img {
            display: block;
            margin: auto;
            max-width: 100%;
        }

        body {
            margin: 10px;
            padding: 10px;
            min-height: 100vh;
            background-image: url(images/2210-removebg-preview.png);
            background-position: center;
            background-repeat: no-repeat;
        }

        .content {
            padding: 50px 50px;
            text-align: center;
        }

        .card {
            margin-bottom: 20px;
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
    </style>
</head>

<body>
<a href="logout.php" class="logout">Logout</a>
<h1>Maseno University First Aid Training System <?php echo $_SESSION['fname']; ?></h1>
    <div class="card">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CPR</h5>
                        <p class="card-text">Training Module</p>
                        <a href="cpr.php" class="btn btn-primary">View Module</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">POISONING</h5>
                        <p class="card-text">Training Module</p>
                        <a href="Poisoning.php" class="btn btn-primary">View Module</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DROWNING</h5>
                        <p class="card-text">Training Module</p>
                        <a href="Drowning.php" class="btn btn-primary">View Module</a>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">BLEEDING</h5>
                        <p class="card-text">Training Module</p>
                        <a href="Bleeding.php" class="btn btn-primary">View Module</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CHOKING</h5>
                        <p class="card-text">Training Module</p>
                        <a href="Choking.php" class="btn btn-primary">View Module</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ELECTRIC</h5>
                        <p class="card-text">Training Module</p>
                        <a href="Electric.php" class="btn btn-primary">View Module</a>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> ACCIDENT</h5>
                        <p class="card-text">Training Module</p>
                        <a href="cpr.php" class="btn btn-primary">View Module</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">BURNS</h5>
                        <p class="card-text">Training Module</p>
                        <a href="cpr.php" class="btn btn-primary">View Module</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">OTHERS</h5>
                        <p class="card-text">Training Module</p>
                        <a href="cpr.php" class="btn btn-primary">View Module</a>
                    </div>
                </div>
            </div>
            <footer>
      <div class="container-fluid bg-dark text-light py-3">
        <div class="row">
          <div class="col-md-6">
            <p>&copy; 2023 First Aid Training System
            </div>
        </div>
    </div>
</body>
</html>