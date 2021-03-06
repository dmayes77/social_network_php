<?php 
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
  $email = strtolower($email);
  $_SESSION['reg_email'] = $email;
  
  $email2 = strip_tags($_POST['reg_email2']);
  $email2 = str_replace(' ', '', $email2);
  $email2 = strtolower($email2);
  $_SESSION['reg_email2'] = $email2;
  
  $password = strip_tags($_POST['reg_password']);
  $password2 = strip_tags($_POST['reg_password2']);

  if ($email == $email2) {
    // check if email format is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
      // check if email exist
      $e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
      $num_rows = mysqli_num_rows($e_check);
      if ($num_rows > 0) {
        array_push($error_array, "Email already in use<br>");
      }
    } else {
      array_push($error_array, "Invalid email format<br>");
    }
    
  } else {
    array_push($error_array, "Emails must match!<br>");
  }

  if(strlen($fname) > 25 || strlen($fname) < 3) {
    array_push($error_array, "Your first name must be between 3 and 25 characters<br>");
  }
  
  if(strlen($lname) > 25 || strlen($lname) < 3) {
    array_push($error_array, "Your last name must be between 3 and 25 characters<br>");
  }
  
  if ($password != $password2) {
    array_push($error_array, "Your passwords do not match!<br>");
  } else {
    if (preg_match('/[^A-Za-z0-9]/', $password)) {
      array_push($error_array, "Your password can only contain characters or numbers<br>");
    }
  }

  if(strlen($password) > 30 || strlen($password) < 6) {
    array_push($error_array, "Your password must be between 6 and 30 chracters<br>");
  }

  if (empty($error_array)) {
    $password = md5($password);

    //generate username
    $uname = explode("@", $email);
    $username = ucfirst(strtolower($uname[0]));

    $rand = rand(1, 2);
    if ($rand == 1) {
      $profile_pic = "assets/images/profile_pics/default/head_alizarin.png";
    } else if($rand == 2) {
      $profile_pic = "assets/images/profile_pics/default/head_amethyst.png";
    }
        
    $query = mysqli_query($con, "INSERT INTO users VALUES (NULL, '$fname', '$lname', '$username', '$email', '$password', CURRENT_TIMESTAMP, '$profile_pic', 0, 0, '', ',');");

    array_push($error_array, "<span style='color: green;'>You're all set to login!</span><br>");

    $_SESSION['reg_fname'] = "";
    $_SESSION['reg_lname'] = "";
    $_SESSION['reg_email'] = "";
    $_SESSION['reg_email2'] = "";
  }
}
?>