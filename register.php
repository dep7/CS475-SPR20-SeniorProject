<?php
/* 
  CS 475 - Senior Project
  Joshua Ly Soumphont - Danielle Pitts - Jacob Saintcross
  register.php
*/

// Start session
session_start();

// Connect to database
include "db.php";

?>

<!DOCTYPE html>
<html>

<head>
  <?php require "header.php"; ?>

  <style>
    body,html {
      height: 100%;
    }
    #reg-vertical {
      margin-top: auto;
      margin-bottom: auto;
    }
    #reg-content {
      border-style: solid;
      width: 100%;
    }
    label {
      white-space: nowrap
    } 
    .jumbotron {
      width: 600px;
    }
    #button-container {
      padding-top: 10px;
    }
    #reg-form {
      width: 100%;
    }
    .input-container {
      width: 60%;
    }
    .input-container label {
      float: left;
    }
  </style>
</head>

<body>
  <div class="container h-100">
    <div class="row align-self-center h-100" >
      <div class="col-10 mx-auto" id="reg-vertical">
        <div class="jumbotron" >
          <h2>Register</h2>
          
          <form action="login.php" method="post" class="validatedForm">
            <div class="flex-column" id="reg-form">
              <div class="d-flex p-2 justify-content-between">
                <div>
                  <label for="username">Username: </label>
                </div>
                <div class="input-container float-right">
                  <input type="text" name="username" placeholder="Username" class="form-control" required>
                  <?php
                    if (isset($_GET['exists'])) {
                      echo "<label for='username'>Username already exists.</label>";
                    }
                  ?>
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
              <div class="d-flex p-2 justify-content-between">
                <div>
                  <label for="password_confirm">Retype Password: </label>
                </div>
                <div class="input-container float-right">
                  <input type="password" name="password_confirm" id="retype-password" placeholder="Retype Password" class="form-control" required>
                </div>
              </div>
            </div>
            
            <div class="d-flex justify-content-center" id="button-container">
              <div class="col-4">
                <input type="button" value="Return" id="return" class="form-control">
              </div>
              <div class="col-4">
                <input type="reset" class="form-control">
              </div>
              <div class="col-4">
                <input type="submit" name="register" value="Register" class="form-control">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      $('#return').on('click', function () {
        window.location.replace("login.php");
      });

      jQuery('.validatedForm').validate({
        rules: {
          username: {
            maxlength: 20
          },
          password: {
            minlength: 8,
            maxlength: 32
          },
          password_confirm: {
            minlength: 8,
            maxlength: 32,
            equalTo: "#password"
          }
        }
      });
    });
  </script>
</body>

</html>