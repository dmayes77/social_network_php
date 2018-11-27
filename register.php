<?php 
require 'config/config.php';
require 'includes/form_handlers/register_form_handlers.php';
require 'includes/form_handlers/login_form_handlers.php';
require 'includes/header.php'
?>
  <div class="wrapper">
    <div class="login_box">
      <div class="login_header">
        <h1>Whispr</h1>
        Login or Sign Up below
      </div>
      <form action="register.php" method="POST">
        <input type="email" name="login_email" placeholder="Email" value = "<?php 
          if(isset($_SESSION['login_email'])) {
            echo $_SESSION['login_email'];
          }
          ?>" required>
        <br>
        <input type="password" name="login_password" placeholder="Password">
        <br>
        <input type="submit" name="login_btn" value="Login">
        <br>
        <?php if (in_array("Email or password is incorrect<br>", $error_array)) {
          echo "Email or password is incorrect<br>";
        } ?>
      </form>
      <br>
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

        <input type="submit" name="reg_btn" value="Register">
        <br>
        <?php
          if (in_array("<span style='color: green;'>You're all set to login!</span><br>", $error_array)) {
            echo "<span style='color: green;'>You're all set to login!</span><br>";
          } ?>
      </form>
    </div>
  </div>
    

<?php require 'includes/footer.php'?>