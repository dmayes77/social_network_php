<?php 
  require 'config/config.php'; 

  if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
  } else {
    header('Location: register.php');
  }
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Whispr</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" 
      type="image/png" 
      href="assets/whispr_icon.ico">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="assets/css/style.css">
      <script src="main.js"></script>
    </head>
    <body>
      <?php require 'includes/navbar.php' ?>
    
