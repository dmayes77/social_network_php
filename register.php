<?php 
session_start();
$con = mysqli_connect('localhost', 'root', '', 'social');

if (mysqli_connect_errno()) {
  echo "Failed to connect: " . mysqli_connect_errno();
}

//Variables
$fname = "";
$lname = "";
$email = "";
$email2 = "";
$password = "";
$password2 = "";
$date = "";//Sign up date
$error_array = array();//Holds error messages

if (isset($_POST['reg_btn'])) {
  $fname = strip_tags($_POST['reg_fname']);
  $fname = str_replace(' ', '', $fname);
  $fname = ucfirst(strtolower($fname));
  $_SESSION['reg_fname'] = $fname;
  
  $lname = strip_tags($_POST['reg_lname']);
  $lname = str_replace(' ', '', $lname);
  $lname = ucfirst(strtolower($lname));
  $_SESSION['reg_lname'] = $lname;
  
  $email = strip_tags($_POST['reg_email']);
  $email = str_replace(' ', '', $email);
  $email = ucfirst(strtolower($email));
  $_SESSION['reg_email'] = $email;
  
  $email2 = strip_tags($_POST['reg_email2']);
  $email2 = str_replace(' ', '', $email2);
  $email2 = ucfirst(strtolower($email2));
  $_SESSION['reg_email2'] = $email2;
  
  $password = strip_tags($_POST['reg_password']);
  $password2 = strip_tags($_POST['reg_password2']);

  $date = date("Y-m-d");

  if ($email == $email2) {
    // check if email format is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
      // check if email exist
      $e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
      $num_rows = mysqli_num_rows($e_check);
      if ($num_rows > 0) {
        array_push($error_array, "Email already in use<br >");
      }
    } else {
      array_push($error_array, "Invalid email format<br >");
    }
    
  } else {
    array_push($error_array, "Emails must match!<br >");
  }

  if(strlen($fname) > 25 || strlen($fname) < 3) {
    array_push($error_array, "Your first name must be between 3 and 25 characters<br >");
  }
  
  if(strlen($lname) > 25 || strlen($lname) < 3) {
    array_push($error_array, "Your last name must be between 3 and 25 characters<br >");
  }
  
  if ($password != $password2) {
    array_push($error_array, "Your passwords do not match!<br >");
  } else {
    if (preg_match('/[^A-Za-z0-9]/', $password)) {
      array_push($error_array, "Your password can only contain characters or numbers<br >");
    }
  }

  if(strlen($password) > 30 || strlen($password) < 6) {
    array_push($error_array, "Your password must be between 6 and 30 chracters<br >");
  }

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>
  <form action="register.php" method="POST">
    <input type="text" name="reg_fname" placeholder="First Name"
    value = "<?php 
      if(isset($_SESSION['reg_fname'])) {
        echo $_SESSION['reg_fname'];
      }
    ?>" required>
    <br >
    <input type="text" name="reg_lname" placeholder="Last Name" value = "<?php 
      if(isset($_SESSION['reg_lname'])) {
        echo $_SESSION['reg_lname'];
      }
    ?>" required>
    <br >
    <input type="email" name="reg_email" placeholder="Email" value = "<?php 
      if(isset($_SESSION['reg_email'])) {
        echo $_SESSION['reg_email'];
      }
    ?>" required>
    <br >
    <input type="email" name="reg_email2" placeholder="Confirm Email" value = "<?php 
      if(isset($_SESSION['reg_email2'])) {
        echo $_SESSION['reg_email2'];
      }
    ?>" required>
    <br >
    <input type="password" name="reg_password" placeholder="Password" required>
    <br >
    <input type="password" name="reg_password2" placeholder="Confirm Password" required>
    <br >
    <input type="submit" name="reg_btn" value="Register">
  </form>
</body>
</html>