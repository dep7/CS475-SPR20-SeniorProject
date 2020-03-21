<?php
/* 
  CS 475 - Senior Project
  Joshua Ly Soumphont
*/

// Start session
session_start();

// Connect to database
include "db.php";

$db = Database::getInstance();
$majors = $db->getUniqueMajors();

if (isset($_POST['major']) && isset($_POST['gpa'])) {
  $majorRows = $db->getMajorRows($_POST['major'], $_POST['gpa']);

  if ($majorRows != 0) {
    $root = majorRowsToCSV($majorRows);
  }
} else {
  $majorRows = $db->getMajorRows($majors[0], 0.0);
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="styles/bootstrap.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="styles/style.css">
  
  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  
  <!-- JavaScript Plugins -->

  <!-- D3.js -->
  <script src="https://d3js.org/d3.v5.min.js"></script>

  
  
</head>
<body>
    
  <div class="wrapper">
    <!-- Sidebar -->  
    <nav id="sidebar">
      
      <form class="form-horizontal" method="post" action="index.php">
      
        <div class="sidebar-header">
          <h2>Student Shift</h2>
        </div>
      
        <ul class="list-unstyled components">
        
          <li>
            <div class="form-group row">
              <label for="majorSelect" class="control-label col-sm-2 col-form-label">Major</label>
              <div class="col-sm-10">
                <select class="form-control" id="majorSelect" name="major">
                    <?php 
                    $first = true;
                    foreach($majors as $val) {
                      if ($first)
                        echo '<option default value="' . $val . '">' . $val . '</option>';
                      else
                        echo '<option value="' . $val . '">' . $val . '</option>';
                      $first = false;
                    }
                    ?>  
                </select>
              </div>
            </div>
          </li>
          <!--
          <li>
            <div class="form-group row">
              <label for="jobType" class="control-label col-sm-2 col-form-label">Occupation</label>
              <div class="col-sm-10">
                <select class="form-control" id="jobType">
                  <option default value="corporate">Corporate</option>
                  <option value="grad">Grad School</option>
                  <option value="goverment">Government</option>
                  <option value="non-profit">Non-Profit</option>
                </select>
              </div>
            </div>
          </li>
          -->
          <li>
            <div class="form-group row">
              <label for="gpa" class="control-label col-sm-2 col-form-label">GPA</label>
              <div class="col-sm-10">
                <select class="form-control" id="gpaInput" name="gpa">
                  <option default value="0">≥ 0.0</option>
                  <option value="1">≥ 1.0</option>
                  <option value="2">≥ 2.0</option>
                  <option value="3">≥ 3.0</option>
                  <option value="4">≥ 4.0</option>
                </select>
              </div>
            </div>
          </li>
        </ul>
      
        <ul class="list-unstyled CTAs">
          <li>
            <input type="submit" class="form-control" id="submit" name="submit">
          </li>
          <li>
            <input type="reset" class="form-control">
          </li>
        </ul>
      </form>
    </nav>
    
    <!-- Page Content -->
    <div id="content">

      <nav class="navbar navbar-expand-sm navbar-custom">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
              <i class="fas fa-align-left"></i>
            </button>
        </div>
      </nav>

      <div id="charts" class="container">
        <div class="row">

          <div id="chart-salary" class="col-xs-6">
            <?php
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
              $salaries[$i] = floatval($salaries[$i] / $total);
                
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
            ?>
            <script src="scripts/chart-salary.js"></script>
          </div>

          <div id="chart-work" class="col-xs-6">
            <?php
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

            //for($i = 0; $i < sizeof($percentage); $i++)
            //  $percentage[$i] = floatval($percentage[$i] / $total);
            
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
            ?>
            <script src="scripts/chart-work.js"></script>
          </div>
        </div>
        <div class="row">
          <div id="chart-cluster" class="col-xs-6">
            <?php
            if ($majorRows != 0) {
              echo "<script>" . "\n";
              echo 'var root = "' . $root . '";';
              echo "</script>" . "\n";

              echo '<script src="scripts/chart-cluster.js"></script>';
            }
            ?>
          </div>
        </div>
      </div>

    </div>
  </div>
  
  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
      });
      
    });
  </script>
  
</body>
</html>
