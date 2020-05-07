<?php
/* 
  CS 475 - Senior Project
  Joshua Ly Soumphont - Danielle Pitts - Jacob Saintcross
  edit.php
*/

// Start session
session_start();

// Connect to database
include "db.php";
$db = Database::getInstance();
$majors = $db->getUniqueMajors();

//Check if user is logged in
if (!isset($_SESSION['User']))
  header('Location: index.php');
else
  if ($_SESSION['User'] == "")
    header('Location: index.php');

// Check set filters
$show = 10;
if (isset($_POST['major-filter']) && isset($_POST['gpa-filter'])) {
  $majorRows = $db->getMajorRows($_POST['major-filter'], $_POST['gpa-filter']);
  $_SESSION['major'] = $_POST['major-filter'];
  $_SESSION['gpa'] = $_POST['gpa-filter'];
} else {
  $majorRows = $db->getMajorRows($majors[0], 0.0);
  $_SESSION['major'] = $majors[0];
  $_SESSION['gpa'] = 0.0;
}

if (isset($_POST['add'])) {
  $schoolPost = $_POST['school'];
  $gradDatePost = $_POST['gradDate'];
  $majorPost = $_POST['major'];
  $minorPost = $_POST['minor'];
  $gpaPost = $_POST['gpa'];
  $companyPost = $_POST['company'];
  $employDatePost = $_POST['employDate'];
  $titlePost = $_POST['title'];
  $typePost = $_POST['type'];
  $salaryPost = $_POST['salary'];

  $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

  $gMonth = intval(date('m',strtotime($gradDatePost)));
  $gradMY = $months[$gMonth - 1] . ", " . date('Y',strtotime($gradDatePost));

  $db->addStudent($gradMY,$employDatePost,$schoolPost,$companyPost,$titlePost,$typePost,$majorPost,$minorPost,$gpaPost,$salaryPost);
} 
else if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sRow = $db->findStudentByID($id);
  
  if (sizeof($sRow) != 0) {
    $db->deleteRowByStudentID($id);
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <?php require "header.php"; ?>
  <style>
    .wrapper {
      margin: 10px;
    }
    table {
      width: 100%;
      table-layout: fixed;
      word-wrap:break-word;
    }
    table thead th {
      font-weight: normal;
    }
    .label-container {
      width: 250px;
    }
    .form-col {
      padding: 10px;
    }
    #content {
      min-height: 100vh;
      padding: 20px;
    }
    #edit-container {
      width: 100%;
    }
    #button-container {
      padding: 10px;
    }
    #filters div {
      padding-left: 10px;
      padding-right: 10px;
    }
    #table-container {
      height: 580px;
    }
    #add-container {
      align-items: center;
    }
    #add-submit input {
      margin: 10px;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
    bottom: .5em;
    }
  </style>
  <script>
    $(document).ready(function () {
      $('#return').on('click', function () {
        window.location.replace("index.php");
      });

      $('.btn-delete').on('click', function() {
        window.location.replace("edit.php?delete=" + $(this).val());
      });

      $('#majorSelect, #gpaInput, #showNum').change(function() {
        $('#edit-form').submit();
      });

      $('#dtVerticalScroll').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true,
      });
      $('.dataTables_length').addClass('bs-select');

      jQuery('.validatedForm').validate({
        rules: {
          school: {
            maxlength: 50
          },
          gradDate: {
            required: true
          },
          major: {
            required: true,
            maxlength: 30
          },
          minor: {
            maxlength: 30
          },
          gpa: {
            range: [0,4],
            required: true
          },
          company: {
            maxlength: 50
          },
          employDate: {
            required: true
          },
          title: {
            required: true,
            maxlength: 50
          },
          salary: {
            required: true
          }
        }
      });
    });
  </script>
</head>

<body>

<div class="wrapper">
  <div class="container-fluid justify-content-center" id="content">
    <div class="shadow-sm p-3 mb-5 bg-white rounded" cellspacing="0" id="edit-container">
      <form action="edit.php" method="post" class="validatedForm" id="edit-form">
        <div class="d-flex justify-content-between" id="button-container">
          <div>
            <input type="button" class="form-control" value="Return" id="return">
          </div>

          <div class="d-flex justify-content-between" id="filters">

            <div>
              <select class="form-control" id="majorSelect" name="major-filter">
                <?php 
                  if ($_SESSION['major'] == 'All')
                    echo '<option selected="selected" value="All">All Majors</option>';
                  else
                    echo '<option value="All">All Majors</option>';

                  foreach($majors as $val) {          
                    if ($val == $_SESSION['major'])
                      echo '<option selected="selected" value="' . $val . '">' . $val . '</option>';
                    else
                      echo '<option value="' . $val . '">' . $val . '</option>';
                  }
                ?>
              </select>
            </div>

            <div>
              <select class="form-control" id="gpaInput" name="gpa-filter">
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

          </div>
        </div>
      </form>
      
        <!--
        <div>
          <input type="submit" class="form-control" value="Save">
        </div>
        -->
      <div class="d-flex justify-content-center" id="table-container">
        <table class="table table-striped table-bordered table-sm" id="dtVerticalScroll">
          <thead>
            <tr>
              <th class="th-sm">Graduation</th>
              <th class="th-sm">Employment</th>
              <th class="th-sm">School</th>
              <th class="th-sm">Company</th>
              <th class="th-sm">Job Title/Study</th>
              <th class="th-sm">Job Type</th>
              <th class="th-sm">Major</th>
              <th class="th-sm">Minor</th>
              <th class="th-sm">GPA</th>
              <th class="th-sm">Salary</th>
              <th class="th-sm">Delete Row</th>
            </tr>
          </thead>
          <tbody>
            <?php include "edit_table.php"; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="shadow-sm p-3 mb-5 bg-white rounded" cellspacing="0">
      <div class="d-flex justify-content-center" id="add-container">
        <form action="edit.php" method="post" class="validatedForm">
          <h2>Add Student</h2>
          <div class="container-fluid d-flex "  id="add-form">
            <div class="form-col">
              <div class="form-group d-flex">
                <div class="label-container">
                  <label for="school">School:</label>
                </div>
                <input type="text" class="form-control" name="school">
              </div>
              <div class="form-group d-flex">
                <div class="label-container">
                  <label for="gradDate">*Graduation:</label>
                </div>
                <input type="date" class="form-control" name="gradDate" required>
              </div>
              <div class="form-group d-flex">
                <div class="label-container">
                  <label for="major">*Major:</label>
                </div>
                <input type="text" class="form-control" name="major" required>
              </div>
              <div class="form-group d-flex">
                <div class="label-container">
                  <label for="minor">Minor:</label>
                </div>
                <input type="text" class="form-control" name="minor">
              </div>
              <div class="form-group d-flex">
                <div class="label-container">
                  <label for="gpa">*GPA:</label>
                </div>
                <input type="number" class="form-control" name="gpa" required>
              </div>
            </div>

            <div class="form-col">
              <div class="form-group d-flex">
                <div class="label-container">
                  <label for="company">Company:</label>
                </div>
                <input type="text" class="form-control" name="company">
              </div>
              <div class="form-group d-flex">
                <div class="label-container">
                  <label for="employDate">*Employment:</label>
                </div>
                <input type="date" class="form-control" name="employDate" required>
              </div>
              <div class="form-group d-flex">
                <div class="label-container">
                  <label for="title">*Job Title/Study:</label>
                </div>
                <input type="text" class="form-control" name="title" required>
              </div>
              <div class="form-group d-flex">
                <div class="label-container">
                  <label for="type">*Job Type:</label>
                </div>
                <select class="form-control" name="type">
                  <option selected="selected" value="Grad School">Grad School</option>
                  <option value="Non-Profit">Non-Profit</option>
                  <option value="Corporate">Corporate</option>
                  <option value="Government">Government</option>
                </select>
              </div>
              <div class="form-group d-flex">
                <div class="label-container">
                  <label for="salary">Salary:</label>
                </div>
                <input type="number" class="form-control" name="salary">
              </div>
            </div>
          </div>
          <div class="form-group d-flex justify-content-center" id="add-submit">
            <div class="col-sm-2">
              <input type="reset" class="form-control">
            </div>
            <div class="col-sm-2">
              <input type="submit" name="add" value="Enter" class="form-control">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>

</html>