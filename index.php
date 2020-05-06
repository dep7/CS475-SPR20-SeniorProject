<?php
/* 
  CS 475 - Senior Project
  Joshua Ly Soumphont - Danielle Pitts - Jacob Saintcross
  index.php
*/

// Start session
session_start();

// Check if signed in, if not send back to login.php
if (!isset($_SESSION['User'])) { //If Session variable User is not set
  $_SESSION['User'] = "";
  header('Location: login.php');
} else {
  if ($_SESSION['User'] == "")
    header('Location: login.php');
}

// Connect to database
include "db.php";

$db = Database::getInstance();
$majors = $db->getUniqueMajors();
$user = $db->findUser($_SESSION['User']);

// Check set filters

if (isset($_POST['major']) && isset($_POST['gpa'])) {
  $majorRows = $db->getMajorRows($_POST['major'], $_POST['gpa']);
  $_SESSION['major'] = $_POST['major'];
  $_SESSION['gpa'] = $_POST['gpa'];

  if (sizeof($majorRows) != 0) {
    $root = majorRowsToCSV($majorRows);
    $dateData = dateRangeCSV($majorRows);
  }
} else {
  $majorRows = $db->getMajorRows($majors[0], 0.0);
  $_SESSION['major'] = $majors[0];
  $_SESSION['gpa'] = 0.0;

  $root = majorRowsToCSV($majorRows);
  $dateData = dateRangeCSV($majorRows);
}

?>

<!DOCTYPE html>
<html>

<head>
  <?php require "header.php"; ?>
</head>

<body class="overflow-hidden">

  <div class="wrapper">
    <!-- Page Content -->
    <div id="content">

      <!-- Header -->

      <div class="table" id="header-container" >
        <div class="row d-flex justify-content-between" id="header">
          <div id="header-title">
            <div id="vertical-align">
              <h1 class="">Student Shift</h1>
            </div>
          </div>
          <form action="login.php" method="post">
            <div class=" form-inline shadow-sm p-3 mb-5 bg-white rounded form-group" id="sign-out-form">
              <div>
                <label>Signed in as <?php echo $_SESSION['User']; ?></label>
              </div>
              <?php
                if ($user[0]['usertype'] == 2) echo '<div><input class="form-control" type="button" name="edit" id="edit" value="Edit Table"></div>';
              ?>
              <div>
                <input class="form-control" type="submit" name="logout" value="Sign-out">
              </div>
              </div>
          </form>
        </div>
      </div>

      <!-- Navigation Bar -->

      <nav class="navbar navbar-expand-sm navbar-custom">
        <div class="container-fluid" >
          <div class="row d-flex justify-content-between" id="form-row">

            <div class="float-left" id="filter-form-div">
              <form id="filter-form" action="index.php" method="post">
                <div class="form-group form-inline float-left">
                  <label for="majorSelect" class="control-label">Major:</label>
                
                  <select class="form-control" id="majorSelect" name="major">
                    <?php 
                      foreach($majors as $val) {          
                        if ($val == $_SESSION['major']) {
                          echo '<option selected="selected" value="' . $val . '">' . $val . '</option>';
                        } else
                          echo '<option value="' . $val . '">' . $val . '</option>';
                      }
                    ?>
                  </select>

                  <label for="gpa" class="control-label">GPA:</label>

                  <select class="form-control" id="gpaInput" name="gpa">
                    <?php 
                    $gpa = ['0.0','1.0','2.0','3.0','4.0'];

                    foreach($gpa as $val) {
                      if ($_SESSION['gpa'] == (float) $val)
                        echo '<option selected="selected" value="' . $val .'">≥ ' . $val . '</option>';
                      else 
                        echo '<option value="' . $val .'">≥ ' . $val . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </form>
            </div>

            <div id="count-rows" class="float-right">
              <h4>
                <?php 
                  echo sizeof($majorRows); 
                  if (sizeof($majorRows) == 1) echo ' result found';
                  else echo ' results found';
                ?>
              </h4>
            </div>

          </div>
        </div>
      </nav>
      
      <div id="charts" class="container-fluid">
        <div id="dashboard-header">
          <h2>Dashboard</h2>
        </div>
        <div class="container-fluid overflow-auto" id="scroll-container">
          <div class="d-flex justify-content-center chart-container" <?php if (sizeof($majorRows) == 0) echo 'style="display: none;"' ?>>
            
            <div id="chart-salary" class="col-xs-6 shadow-sm p-3 mb-5 bg-white rounded">
              <?php
              if (sizeof($majorRows) != 0) {
                $salaries = array();
                for($i = 0; $i < 6; $i++)
                  $salaries[] = 0;
              
                foreach($majorRows as $val)
                  if ($val['Salary'] < 20000)
                    $salaries[0] += 1;
                  elseif ($val['Salary'] >= 20000 && $val['Salary'] < 30000 )
                    $salaries[1] += 1;
                  elseif ($val['Salary'] >= 30000 && $val['Salary'] < 40000 )
                    $salaries[2] += 1;
                  elseif ($val['Salary'] >= 40000 && $val['Salary'] < 50000 )
                    $salaries[3] += 1;
                  elseif ($val['Salary'] >= 50000 && $val['Salary'] < 60000 )
                    $salaries[4] += 1;
                  else
                    $salaries[5] += 1;
              
                $total = 0;
                for($i = 0; $i < 6; $i++)
                  $total += $salaries[$i];
              
                for($i = 0; $i < 6; $i++)
                  $salaries[$i] = floatval($salaries[$i] / $total) * 100;
                  
                echo "<script>" . "\n";
                echo '  var salary = [';
              
                for($i = 0; $i < 6; $i++) { 
                  if ($i < 5)
                    echo $salaries[$i] . ',';
                  else
                    echo $salaries[$i];
                }

                echo '];' . "\n";
                echo "</script>" . "\n";
              }

              ?>

              <?php if (sizeof($majorRows) != 0) echo '<script src="scripts/chart-salary.js"></script>' ?>
              
            </div>

            <div id="chart-work" class="col-xs-6 shadow-sm p-3 mb-5 bg-white rounded">
              <?php
              if ($majorRows != 0) {
              $jobTypes = array();
              foreach($majorRows as $val)
                $jobTypes[$val['Job_Type']] = 0;
              
              $jobTypes = array_keys($jobTypes);

              $percentage = array();
              for($i = 0; $i < sizeof($jobTypes); $i++)
                $percentage[$i] = 0;

              $total = 0;
              foreach($majorRows as $x) {
                foreach($jobTypes as $key=>$y) {
                  if ($x['Job_Type'] == $y) {
                    $total++;
                    $percentage[$key]++;;
                  }
                }
              }

              for($i = 0; $i < sizeof($percentage); $i++)
                $percentage[$i] = floatval($percentage[$i] / $total) * 100;
              
              echo "<script>" . "\n";
              echo '  var percentage = [';
                
              for($i = 0; $i < sizeof($percentage); $i++) { 
                if ($i < sizeof($percentage)-1)
                  echo $percentage[$i] . ',';
                else
                  echo $percentage[$i];
              }
    
              echo '];' . "\n";
              echo '  var types = [';
                
              for($i = 0; $i < sizeof($jobTypes); $i++) { 
                if ($i < sizeof($jobTypes)-1)
                  echo '"' . $jobTypes[$i] . '",';
                else
                  echo '"' . $jobTypes[$i] . '"';
              }
    
              echo '];' . "\n";
              echo "</script>" . "\n";
              }
              ?>

              <?php if (sizeof($majorRows) != 0) echo '<script src="scripts/chart-work.js"></script>' ?>
              
            </div>
            <div id="plot-months" class="col-xs-6 shadow-sm p-3 mb-5 bg-white rounded">
              <?php
                echo "<script>" . "\n";
                echo 'var dateData = ' . $dateData['csv'] . ';' , "\n";
                echo 'var minRange = "' . $dateData['minRange'] . '";' . "\n";
                echo 'var maxRange = "' . $dateData['maxRange'] . '";' . "\n";

                echo "</script>" . "\n";

                echo '<script src="scripts/plot-months.js"></script>' . "\n";
              ?>
            </div>
            <div id="chart-cluster" class="shadow-sm p-3 mb-5 bg-white rounded">
              <?php
              if (sizeof($majorRows) != 0) {
                echo "<script>" . "\n";
                echo 'var root = "' . $root . '";';
                echo "</script>" . "\n";

                echo '<script src="scripts/chart-cluster.js"></script>';
              }
              ?>
            </div>
          </div>
          
        </div>

        
        <div class="row">
          
        </div>
      </div>

    </div>
  </div>

  <script>
    $(document).ready(function () {
      /*
      $(window).on('resize', function(){
        var win = $(this); //this = window
        if (win.width() >= 1360) { 
          $('#header').css('min-height','100')
          $('#header').css('height','100')
        } else {
          $('#header').css('min-height','180')
          $('#header').css('height','180')
        }
      });
      */

      $('#register').on('click', function() {
        window.location.replace("register.php");
      });

      $('#edit').on('click', function() {
        window.location.replace("edit.php");
      });

      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
      });

      $('#majorSelect, #gpaInput').change(function() {
        console.log("Check");
        $('#filter-form').submit();
      });
      /*
      $('#login-form').validate({
        rules: {
          password: {
            required: true,
              minlength: 8,
              maxlength: 32,
          },
            cfmPassword: {
              equalTo: "#login-password",
              minlength: 8,
              maxlength: 32,
            }
        },
        messages: {
          password: {
            reuqired: "The password is required"
          }
        }
      });
      */
    });
    
  </script>

</body>

</html>