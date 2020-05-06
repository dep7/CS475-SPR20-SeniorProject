<?php
/* 
  CS 475 - Senior Project
  Joshua Ly Soumphont - Danielle Pitts - Jacob Saintcross
  edit_table.php
*/

$rows = array();

if ($_SESSION['major'] == 'All')
  $rows = $db->getAllRows($_SESSION['gpa']);
else
  $rows = $db->getMajorRows($_SESSION['major'], $_SESSION['gpa']);

for ($i = 0; $i < sizeof($rows); $i++) {
  echo '<tr id=student_' . $rows[$i]['StudentID'] .'>' . "\n";
  echo '  <td>' . $rows[$i]['Graduation_Date'] . '</td>' . "\n";
  echo '  <td>' . $rows[$i]['Employment'] . '</td>' . "\n";
  echo '  <td>' . $rows[$i]['School_Name'] . '</td>' . "\n";
  echo '  <td>' . $rows[$i]['Company_Name'] . '</td>' . "\n";
  echo '  <td>' . $rows[$i]['Job_Title_Area_of_Study'] . '</td>' . "\n";
  echo '  <td>' . $rows[$i]['Job_Type'] . '</td>' . "\n";
  echo '  <td>' . $rows[$i]['Major'] . '</td>' . "\n";
  echo '  <td>' . $rows[$i]['Minor'] . '</td>' . "\n";
  echo '  <td>' . $rows[$i]['GPA'] . '</td>' . "\n";
  echo '  <td>' . $rows[$i]['Salary'] . '</td>' . "\n";
  echo '  <td><button type="button" class="btn btn-link btn-delete" value="' . $rows[$i]['StudentID'] . '">Delete</button></td>' . "\n";
  echo '</tr>' . "\n";
}

?>