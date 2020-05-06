<?php
include "db.php";
$db = Database::getInstance();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script src="https://d3js.org/d3.v5.min.js"></script>
</head>
<body>
    <!--<svg width="500" height="500">
        <rect x="0" y="0" width="300" height="200" fill="black"></rect>
    </svg>-->
    <div class="myclass">Hello World!</div>
    <script>
        alert(d3.select("div.myclass").append("span"));
    </script>
</body>
</html>
