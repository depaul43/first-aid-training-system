<?php
ob_start();
session_start();

// connect to the database
try {
  $conn = mysqli_connect('localhost', 'root', '', 'first');
  if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}
} catch(Exception $e) {
  echo 'Database Connection Failed.';
}

$errors = array();

// LOGIN USER
if (isset($_POST['login_btn'])) {
  $username = $_POST['email'];
  $password = $_POST['password'];

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $encrypted_password = md5($password);

    $login_query = "SELECT * FROM `usertable` WHERE Email='$username' AND ConfirmPassword='$encrypted_password' ";
    $results = mysqli_query($conn, $login_query);

    

    if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_assoc($results);
      //sessions
      $_SESSION['regno'] = $row['RegNum'];
      $_SESSION['fname'] = $row['FirstName'];
      $_SESSION['lname'] = $row['LastName'];
      $_SESSION['mail'] = $row['Email'];
      $_SESSION['gender'] = $row['Gender'];
      $_SESSION['success'] = "You are now logged in";

   // set session cookie parameters
   session_set_cookie_params(0, '/', '', true, true);

  //  Set session.cookie_secure = 1 to ensure that the session cookie is only sent over HTTPS.
   ini_set('session.cookie_secure', 1);
  //  Set session.cookie_httponly = 1 to ensure that the session cookie is not accessible through client-side scripts.
   ini_set('session.cookie_httponly', 1);
  //  Set session.use_only_cookies = 1 to ensure that the session ID is only transmitted via cookies.
   ini_set('session.use_only_cookies', 1);
  //  Set session.cookie_lifetime = 0 to ensure that the session cookie expires when the browser is closed.
   ini_set('session.cookie_lifetime', 0);

  //  Use session_regenerate_id() to generate a new session ID on every page load.
   session_regenerate_id();

      header('location: dashboard.php');
    }else{
      array_push($errors, "Incorrect Username or Password");
      header('location: index.php');
    }
  }
}

//register user
if (isset($_POST['register'])) {
    $regnum = $_POST['RegNum'];
    $fname = $_POST['FirstName'];
    $mname = $_POST['MiddleName'];
    $lname = $_POST['LastName'];
    $mail = $_POST['email'];
    $password = $_POST['Password'];
    $confirm_password = $_POST['ConfirmPassword'];
    $gender = $_POST['Gender'];

    //VALIDATE DATA
    if (empty($regnum)) {
    array_push($errors, "Username is required");
    }
    if (empty($fname)) {
    array_push($errors, "firstname is required");
    }
    if (empty($mname)) {
    array_push($errors, "middle name is required");
    }
    if (empty($lname)) {
    array_push($errors, "lastname is required");
    }
    if (empty($mail)) {
    array_push($errors, "Email is required");
    }
    if (empty($gender)) {
    array_push($errors, "gender is required");
    }
    if($password !== $confirm_password){
    array_push($errors, "Passwords do not match.");
    }

    if (count($errors) == 0) { 
    // first check the database to make sure
    $admin_check_query = "SELECT * FROM `usertable` WHERE Email='$mail'  LIMIT 1";
    $result = mysqli_query($conn, $admin_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['Email'] ===$mail) {
         array_push($errors, "user already exists");
        }
    }
    // Finally, register if there are no errors in the form
    if (count($errors) == 0) {
        $encrypted_pass = md5($password);
        $user_register_query = "INSERT INTO `usertable`(`RegNum`, `FirstName`, `MiddleName`, `LastName`, `Email`, `ConfirmPassword`, `Gender`)
        VALUES ('$regnum','$fname','$mname','$lname','$mail','$encrypted_pass','$gender')";
        mysqli_query($conn, $user_register_query);

        //redirect to login page
        header('location: index.php');
    }else{
            //remain on register page
        header('location: register.php');
    }
    }
}

ob_end_flush();
?>