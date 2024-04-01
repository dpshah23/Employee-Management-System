<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Panel | Employee Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    
</body>
</html>

<?php
if(!$_SESSION['login']==true){
    header('location: login.php');
}
include 'navbar.php';

echo "<br><br>";
echo "<h3>Current Date : <?php date('D-m-Y'); ?></h3>";

include 'dbconfig.php';

$empid=$_SESSION['empid'];

echo "<h3>Hello , $_SESSION['fname']";
$rows=mysqli_query($conn,"SELECT * FROM attendence WHERE empid='$empid'");

echo "<div class="container">";

echo "<table class="table">";
echo "<thead>";
    echo "<tr>";
      echo "<th scope=\"col\">#</th>";
      echo "<th scope=\"col\">Date</th>";
      echo "<th scope=\"col\">Clock IN Time</th>"
      echo "<th scope=\"col\">Status</th>";
    echo "</tr>";
  echo "</thead>";

  echo "<tbody>";
        for($i=0;$i<count($rows);$i++){
            echo "<div id=\"tabledata\">";
            echo "<tr>";
            echo "<th scope="row">($i+1)</th>";
            echo "<td>$rows['cdate']</td>";
            echo "<td>$rows['ctime']</td>";
            echo "<td id=\"status\">$rows['cstatus']</td>";
        echo "</tr>";
        echo "</div>";
        }
 echo "</tbody>"
echo "</div>";

echo "<script>";

echo "var statusElements = document.querySelectorAll(\"#status\");";

echo "statusElements.forEach(function(element) {";
  
echo "    var status = element.innerText.trim();";

    echo "switch(status) {";
    echo "    case \"Late\":";
            echo "element.parentNode.style.border = \"2px solid orange\";";
            echo "break;";
        echo "case \"Absent\":"
         echo "   element.parentNode.style.border = \"2px solid red\";";
         echo "   break;"
        echo "case \"Present\":";
        echo  "element.parentNode.style.border = \"2px solid green\";";
        echo "   break;";
        echo "default:";
            echo "break;";

            echo "</script>";
    }
});


?>

</body>
</html>