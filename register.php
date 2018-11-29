<?php 
require 'config/config.php';
require 'includes/form_handlers/register_form_handlers.php';
require 'includes/form_handlers/login_form_handlers.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" 
      type="image/png" 
      href="assets/whispr_icon2.ico">
    <link rel="stylesheet" href="assets/css/register_style.css">
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="assets/js/register.js"></script>
  </head>
  <body>
<?php 
  if (isset($_POST['reg_btn'])) {
    echo "
      <script>
        $(document).ready(function() {
          $('#first').hide();
          $('#second').show();
        })
      </script>
    ";
  }
?>
  <div class="wrapper">
    <div class="login_box">
      <div class="login_header">
        <div>
          
          <h1><img src="assets/images/whispr_icon2.png" alt="Whispr">Whispr</h1>
        </div>
        Login or Sign Up below
      </div>

      <!-- Login form -->
      <div id="first">
        <form action="register.php" method="POST">
          <input type="email" name="login_email" placeholder="Email" value = "<?php 
            if(isset($_SESSION['login_email'])) {
              echo $_SESSION['login_email'];
            }
            ?>" required>
          <br>
          <input type="password" name="login_password" placeholder="Password">
          <br>
          <?php if (in_array("Email or password is incorrect<br>", $error_array)) {
            echo "Email or password is incorrect<br>";
          } ?>
          <input type="submit" name="login_btn" value="Login">
          <br>
          <a href="#" id="signup" class="signup">Need an account? Register here!</a>
        </form>
      </div>
      
      <!-- Sign Up form -->
      <div id="second">
        <form action="register.php" method="POST">
          <input type="text" name="reg_fname" placeholder="First Name"
          value = "<?php 
            if(isset($_SESSION['reg_fname'])) {
              echo $_SESSION['reg_fname'];
            }
          ?>" required>
          <br>
          <?php
            if (in_array("Your first name must be between 3 and 25 characters<br>", $error_array)) {
              echo "Your first name must be between 3 and 25 characters<br>";
            }
          ?>

          <input type="text" name="reg_lname" placeholder="Last Name" value = "<?php 
            if(isset($_SESSION['reg_lname'])) {
              echo $_SESSION['reg_lname'];
            }
          ?>" required>
          <br>
          <?php
            if (in_array("Your last name must be between 3 and 25 characters<br>", $error_array)) {
              echo "Your last name must be between 3 and 25 characters<br>";
            }
          ?>

          <input type="email" name="reg_email" placeholder="Email" value = "<?php 
            if(isset($_SESSION['reg_email'])) {
              echo $_SESSION['reg_email'];
            }
          ?>" required>
          <br>

          <input type="email" name="reg_email2" placeholder="Confirm Email" value = "<?php 
            if(isset($_SESSION['reg_email2'])) {
              echo $_SESSION['reg_email2'];
            }
          ?>" required>
          <br>
          <?php
            if (in_array("Email already in use<br>", $error_array)) {
              echo "Email already in use<br>";
            }
            else if (in_array("Invalid email format<br>", $error_array)) {
              echo "Invalid email format<br>";
            }
            else if (in_array("Emails must match!<br>", $error_array)) {
              echo "Emails must match!<br>";
            }
          ?>

          <input type="password" name="reg_password" placeholder="Password" required>
          <br>

          <input type="password" name="reg_password2" placeholder="Confirm Password" required>
          <br>
          <?php
            if (in_array("Your passwords do not match!<br>", $error_array)) {
              echo "Your passwords do not match!<br>";
            } 
            else if (in_array("Your password can only contain characters or numbers<br>", $error_array)) {
              echo "Your password can only contain characters or numbers<b >";
            }
            else if (in_array("Your password must be between 6 and 30 chracters<br>", $error_array)) {
              echo "Your password must be between 6 and 30 chracters<br>";
            }
          ?>
          <?php
            if (in_array("<span style='color: green;'>You're all set to login!</span><br>", $error_array)) {
              echo "<span style='color: green;'>You're all set to login!</span><br>";
            } ?>
          <input type="submit" name="reg_btn" value="Register">
          <br>
          
            <a href="#" id="login" class="login">Already have an account? Sign in here!</a>
        </form>
      </div>

    </div>
  </div>
  </body>
</html>