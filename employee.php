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

<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('location: login.php');
    exit();
}
include 'navbar.php';

echo "<br><br>";
echo "<h3>Current Date : " . date('D-m-Y') . "</h3>";

include 'dbconfig.php';

$empid = $_SESSION['empid'];

echo "<h3>Hello , " . $_SESSION['fname'] . "</h3>";

$sql = mysqli_query($conn, "SELECT * FROM attendence WHERE empid='$empid'");
$rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);

echo "<div class=\"container\">";
echo "<table class=\"table\">";
echo "<thead>";
echo "<tr>";
echo "<th scope=\"col\">#</th>";
echo "<th scope=\"col\">Date</th>";
echo "<th scope=\"col\">Clock IN Time</th>";
echo "<th scope=\"col\">Status</th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";
foreach ($rows as $i => $row) {
    echo "<tr>";
    echo "<th scope=\"row\">" . ($i + 1) . "</th>";
    echo "<td>" . $row['cdate'] . "</td>";
    echo "<td>" . $row['ctime'] . "</td>";
    echo "<td id=\"status\">" . $row['cstatus'] . "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";
?>

<script>
    var statusElements = document.querySelectorAll("#status");

    statusElements.forEach(function(element) {
        var status = element.innerText.trim();
        switch(status) {
            case "Late":
                element.parentNode.style.border = "2px solid orange";
                break;
            case "Absent":
                element.parentNode.style.border = "2px solid red";
                break;
            case "Present":
                element.parentNode.style.border = "2px solid green";
                break;
            default:
                break;
        }
    });
</script>

</body>
</html>
