<?php
if(!$_SESSION['login']==true){
    header('location: login.php');
}
include 'navbar.php';

echo "<br><br>";
echo "<h3>Current Date : <?php date('D-m-Y'); ?></h3>";

include 'dbconfig.php';

$empid=$_SESSION['empid'];

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
            echo "<td>$rows['date']</td>";
            echo "<td>$rows['time']</td>";
            echo "<td id=\"status\">$rows['status']</td>";
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