<?php
/* 
  CS 475 - Senior Project
  Joshua Ly Soumphont - Danielle Pitts - Jacob Saintcross
  login.php
*/

// Start session
session_start();

// Connect to database
include "db.php";
$db = Database::getInstance();

// Resets User session variable when post logout is received

if (isset($_POST['logout'])) {
    $_SESSION['User'] = "";
}

// Redirect to index if logged in

if (isset($_SESSION['User']))
    if ($_SESSION['User'] != "")
        header('Location: index.php');

// Check for sign-in/registration attempt

$loginErr = false; //Sets sign-in alert

if (isset($_POST['login'])) { //Sets the User session variable in successful login
  $user = $db->findUser($_POST['username']);
  
  if (sizeof($user) != 0) {
    if ($user[0]['username'] === $_POST['username']) {
      if (password_verify($_POST['password'],$user[0]['userpass'])) {
        $_SESSION['User'] = $user[0]['username'];
        header('Location: index.php');
      } else $loginErr = true;
    } else $loginErr = true;
  } else $loginErr = true;
} 
else if (isset($_POST['register'])) {
    $user = $db->findUser($_POST['username']);
    if (sizeof($user) != 0) {
      header('Location: register.php?exists=1');
    } else {
      $db->addUser($_POST['username'], $_POST['password']);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
  <?php require "header.php"; ?>

  <style>
    body,html {
      height: 100%;
    }
    label {
      white-space: nowrap
    } 
    .jumbotron {
      width: 600px;
    }
    #button-container {
        padding: 10px;
    }
    #reg-vertical {
      margin-top: auto;
      margin-bottom: auto;
    }
  </style>
</head>

<body>
  <div class="container h-100">
    <div class="row align-self-center h-100" >
      <div class="col-10 mx-auto" id="reg-vertical">
        <div class="jumbotron" >
          <h2>Sign-in</h2>
          
          <?php if ($loginErr) echo '<div class="text-danger"><p>Wrong Username or password</p></div>'; ?>

          <form action="login.php" method="post" class="validatedForm">
            <div class="flex-column" id="login-form">
              <div class="d-flex p-2 justify-content-between">
                <div>
                  <label for="username">Username: </label>
                </div>
                <div class="input-container float-right">
                  <input type="text" name="username" placeholder="Username" class="form-control" required>
                </div>
              </div>
              <div class="d-flex p-2 justify-content-between">
                <div>
                  <label for="password">Password: </label>
                </div>
                <div class="input-container float-right">
                  <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                </div>
              </div>
            </div>
            
            <div class="d-flex justify-content-center">
              <div class="col-4" id="button-container">
                <input type="button" name="register" id="register" value="Register" class="form-control">
              </div>
              <div class="col-4" id="button-container">
                <input type="submit" name="login" value="Sign-in" class="form-control">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      $('#register').on('click', function () {
        window.location.replace("register.php");
      });
    });
  </script>
</body>

</html>