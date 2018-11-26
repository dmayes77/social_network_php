<?php 

  if (isset($_POST['login_btn'])) {
    $email = filter_var($_POST['login_email'], FILTER_SANITIZE_EMAIL);

    $_SESSION['login_email'] = $email;
    $password = md5($_POST['login_password']);

    $login_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $check_login_query = mysqli_num_rows($login_query);

    if ($check_login_query == 1) {
      $user = mysqli_fetch_array($login_query);
      $username = $user['username'];

      $is_closed_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND is_closed = 'yes'" );
      if (mysqli_num_rows($is_closed_query) == 1) {
        $reopen_acct = mysqli_query($con, "UPDATE users SET is_closed = 'no' WHERE email = '$email'");
      }

      $_SESSION['username'] = $username;
      header("Location: index.php");
      exit();
    } else {
      array_push($error_array, "Email or password is incorrect<br>");
    }
  }

?>
